<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Task;
use DateTime;
use Google\Service\CloudResourceManager\Project;
use Google\Service\Dataproc\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProjectController extends Controller
{
    //


    public function index()
    {



        $today = new DateTime();
        $currentMonth = date('m');
        $currentYear = date('Y');
        // dd($this->makeRec());

        $tasks = Task::where('status', 1)->get()->map(function ($item) {
            $project = Projects::where('id', $item->project_id)->first();
            $item->project = $project->name;
            return $item;
        });
        $projects = Projects::where('status', 1)->get()->map(function ($item) {
            $date1 = new DateTime();
            $date2 = new DateTime($item->end_date);
            $interval = $date2->diff($date1);
            $item->days_left = $interval->days;
            return $item;
        });

        // $points = DB::table('tblpoints')->whereMonth('date', $today->format('d'))->get();
        $points = DB::table('tblpoints')->get();
        $recOfMonth = DB::table('tblpoints')->whereMonth('date', $currentMonth)->whereYear('date', $currentYear)->get();
        // dd($recOfMonth);
        if (count($recOfMonth) <= 0) {
            // dd('this');
            $this->makeRec();
        }



        return view('admin.index', compact('tasks', 'projects', 'points'));
    }
    public function projects()
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
    public function taskAdd()
    {

        $projects = Projects::where('status', 1)->get();
        return view('admin.add_task', compact('projects'));
    }
    public function taskCreate(Request $req)
    {
        $input['name'] = $req->name;
        $input['project_id'] = $req->project_id;
        $input['points'] = $req->points;
        $input['type'] = $req->type;
        $input['description'] = $req->description;



        Task::create($input);

        return redirect()->route('task.add');
    }
    public function makeRec()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Get the number of days in the current month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);


        $dates = [];
        // Create records for each day of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = $currentYear . '-' . $currentMonth . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
            $dates[]  = $date;
            // YourModel::create([
            //     'date' => $date,
            //     // Add any other fields you want to populate
            // ]);

            $inputDate['user_id'] = 1;
            $inputDate['task_id'] = 1;
            $inputDate['value'] = 0;
            $inputDate['date'] = $date;

            DB::table('tblpoints')->insert($inputDate);
        }

        return $dates;
    }
}
