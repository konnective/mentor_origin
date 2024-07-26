<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use stdClass;

class BlogController extends Controller
{
    //
    public function blogs()
    {
        $data = Blog::get();

        return response()->json(['message' => 'true', 'data' => $data]);
    }

    public function add_blog(Request $request)
    {
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['user_id'] = $request->user_id;
        $input['topic'] = $request->topic;


        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'local');
            $url = Storage::url($path);
            $link = 'http://127.0.0.1/the_mentor/storage/app/uploads/' . $filename;
            $input['img'] = $link;
        }

        Blog::create($input);

        return response()->json([
            'message' => 'Operation completed successfully',
        ], 200);
    }

    public function one_blog(Request $request)
    {
        #get blog based on id
        $blog = Blog::where('topic', $request->topic_id)->where('id', $request->blog_id)->first();
        #if blog return blog else error
        $subtopics = Blog::where('topic', $request->topic_id)->get();
        if (!empty($subtopics) && !empty($blog)) {
            $subs = [];

            foreach ($subtopics as $item) {
                $subObj = new stdClass;
                $subObj->id = $item->id;
                $subObj->title = $item->title;
                $subs[] = $subObj;
            }
            $blog->subtopic = $subs;
        }
        if ($blog) {
            return response()->json([
                "data" => $blog,
                "message" => "success",
            ]);
        } else {
            return response()->json([

                "message" => "No data found",
            ]);
        }
    }
    public function topics(Request $request)
    {
        $data = Topic::where('is_active', 1)->get(['id', 'name']);
        foreach ($data as $item) {
            $ids = [];
            $item->blogs = Blog::where('topic', $item->id)->get(['id']);
        }

        if ($data) {
            #return data with message
            return response()->json([
                'data' => $data,
                'message' => 'Successfully retrieved data',
            ], 200);
        } else {
            return response()->json([
                'data' => 'not found',

            ], 200);
        }
    }
}
