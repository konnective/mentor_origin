<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Dailypoints;
use App\Models\Person;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductController extends Controller
{
    //
    public function index()
    {

        return view('products');
    }
    public function goes()
    {

        $data['path'] = env('APP_URL');
        $data['projects'] = Project::get();
        foreach ($data['projects'] as $item) {
            $item->cycles = Task::where('project_id', $item->id)->sum('cycles');
            $item->days = Task::where('project_id', $item->id)->sum('duration');
        }

        return view('test', $data);
    }
    public function task_list($id)
    {

        $data['path'] = env('APP_URL');
        $data['items'] = Task::where('project_id', $id)->get();

        return view('tasks', $data);
    }

    public function create()
    {
        // dd('this');
        $data['path'] = env('APP_URL');
        $data['projects'] = Project::get();

        return view('add_task', $data);
    }
    public function create_project()
    {
        // dd('this');
        $data['path'] = env('APP_URL');
        $data['projects'] = Project::get();

        return view('add_project', $data);
    }
    public function store(Request $req)
    {
        // dd('this');
        $task = new Task;
        $task->name = $req->task_name;
        $task->points = $req->points;
        $task->duration = $req->duration;
        $task->project_id = $req->project_id;
        $task->save();
        return back()->with('message', 'Task created successfully!');
    }
    public function store_project(Request $req)
    {
        // dd('this');
        $project = new Project;
        $project->name = $req->name;
        $project->end_date = $req->end_date;

        $project->save();
        return back()->with('message', 'Project added successfully!');
    }
    public function update(Request $req, $id)
    {
        // dd('this');
        $cycles = $req->cycles;
        $date = Carbon::now();
        // $date = Carbon::create($dt);
        $daily = Dailypoints::whereDate('date', $date)->first();
        if ($daily) {
            $daily->cycles  = $daily->cycles + $cycles;
            $daily->value  = $daily->value + $cycles;
            $daily->update();
        } else {
            Dailypoints::create([
                "date" => $date,
                "value" => $cycles,
                "cycles" => $cycles
            ]);
        }
        // $project  = Project::findOrFail($req->project_id);
        // $project->cycles = $project->cycles + $cycles;

        $task = Task::findOrFail($id);
        $updated = Carbon::create($task->updated_at);
        if ($updated->lt($date)) {
            $task->duration = $task->duration + 1;
        }
        $task->cycles = $task->cycles + $cycles;
        $task->save();
        return response()->json([
            "success" => true
        ]);
    }

    public function payment()
    {
        return view('fincreate');
    }
    public function tasks()
    {
        $data = Task::where('description', 'daily')->where('status', 0)->get();

        if ($data) {
            return $this->sendResponse($data, 'success');
        } else {
            return [
                "message" => "error"
            ];
        }
    }

    public function daily_task()
    {
        Task::where('description', 'daily')->update(['status' => 0]);

        $data = Task::where('description', 'daily')->where('status', 0)->get();

        if ($data) {
            return $this->sendResponse($data, 'success');
        } else {
            return [
                "message" => "error"
            ];
        }
    }

    public function remove_task(Request $request)
    {
        $id = $request->task_id;
        $points = $request->points;
        $input['status'] = 1;
        Task::where('id', $id)->update($input);


        $date = date('Y-m-d'); //$currentDate = date('Y-m-d'); 


        $points_data = Dailypoints::where('date', $date)->first('value'); //$user = User::where('name', 'John')->first();



        if (!empty($points_data)) {
            $new_val = $points_data->value + $points;
            $inputd['value'] = $new_val;
            Dailypoints::where('date', $date)->update($inputd);
        } else {
            $inputd['date'] = $date;
            $inputd['value'] = $points;
            $inputd['user_id'] = $request->user_id;
            Dailypoints::create($inputd);
        }

        $usr_points = Person::where('id', $request->user_id)->get('points');
        $new_pts = $usr_points[0]->points + $points;
        Person::where('id', $request->user_id)->update(['points' => $new_pts]);


        $data = Task::where('description', 'daily')->where('status', 0)->get();

        if ($data) {
            return $this->sendResponse($data, 'success');
        } else {
            return [
                "message" => "error"
            ];
        }
    }

    public function add_task(Request $request)
    {
        $input['name'] = $request->name;
        $input['duration'] = $request->duration;
        $input['points'] = $request->points;
        $input['description'] = $request->description;
        $input['status'] = 0;

        Task::create($input);

        return [
            'success' => true
        ];
    }


    public function daily_cycles(Request $request)
    {
        $today = Carbon::now();

        $month  = $today->copy()->format('m');
        // $month  = 11;

        $data['points'] = Dailypoints::whereMonth('date', $month)->get();
        foreach ($data['points'] as $item) {
            $item->day = Carbon::create($item->date)->format('l');
        }
        // dd($data);
        return view('daily_cycles', $data);
    }
    public function makeTask(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            'name' => 'required',
            // 'email'=> ['required', Rule::unique('items','email')],  this is for fields you want unique
            'duration' => 'required',
            'points' => 'required',
            // 'img' => 'required',
            // 'description' => 'required',
        ]);
        $formFields['status'] = 0;
        Task::create($formFields);
        return redirect('/dashboard')->with('message', 'task created successfully');
        // dd($request);
    }


    public function sendResponse($data, $message)
    {

        $response = [
            'message' => $message,
            'data' => $data

        ];
        return response()->json($response);
    }
}
