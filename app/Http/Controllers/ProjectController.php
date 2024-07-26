<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Google\Service\CloudResourceManager\Project;
use Google\Service\Dataproc\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProjectController extends Controller
{
    //


    public function index()
    {

        $pro = Projects::where('status', 1)->get();

        return view('admin.projects', compact('pro'));
    }

    public function add()
    {


        return view('admin.add_project');
    }
    public function edit($id)
    {


        $item = Projects::where('id', $id)->first();

        return view('admin.edit_pro', compact('item'));
    }
    public function store(Request $req)
    {

        $input['name'] = $req->name;
        $input['cycles'] = $req->cycles;
        $input['end_date'] = $req->end_date;
        $input['user_id'] = 1;
        $input['description'] = $req->description;



        Projects::create($input);

        FacadesSession::flash('message', 'This is a message!');
        return redirect()->back()->with('success', 'project created successfully');
    }
    public function update(Request $req)
    {
        $projectId = $req->project_id;
        $input['title'] = $req->title;
        $input['end_date'] = $req->end_date;
        $input['user_id'] = 1;


        // Projects::where('id', $projectId)->update($input);

        return redirect()->back()->with('success', 'project updated successfully');
    }
}
