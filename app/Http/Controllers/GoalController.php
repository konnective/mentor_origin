<?php

namespace App\Http\Controllers;

use App\Models\Dailypoints;
use App\Models\Goals;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    //

    public function projects(Request $request)
    {
        $data = Project::where('status', 1)->get();

        return response()->json([
            "success" => true,
            "data" => $data,
        ]);
    }

    public function index(Request $request)
    {
        $data =  Goals::where('trash', 0)->get();
        // print_r($data[0]->points);
        // exit;
        // for ($i = 0; $i < count($data); $i++) {

        //     $data[$i]['percent'] = $data[$i]->points / $data[$i]->total_points * 100;
        // }

        foreach ($data as $item) {
            $item->percent = $item->points / $item->total_points * 100;
            $item->completed = $item->total_days - $item->days;
        }

        return response()->json([
            'data' => $data,
            // 'exp' => $data,
        ]);
    }

    public function add_goal(Request $request)
    {

        $input['total_points'] = $request->total_points;
        $input['name'] = $request->name;
        $input['total_days'] = $request->total_days;
        $input['days'] = $request->total_days;
        $input['project_id'] = $request->project_id;
        $input['points'] = 0;
        $input['trash'] = 0;

        Goals::create($input);

        #return reposnse with message success
        return response()->json([
            "message" => 'goal added'
        ]);
    }

    public function goal_next(Request $request)
    {
        $goal_id = $request->id;

        $data = Goals::where('id', $goal_id)->get();
        if ($data[0]->days != 0) {
            $unit =  $data[0]->total_points / $data[0]->total_days;
            $new_day = $data[0]->days - 1;
            $new_point = $data[0]->points + $unit;
            $input['points'] = $new_point;
            $input['days'] = $new_day;
        } else {
            $input['trash'] = 1;
            $date = date('Y-m-d');

            $points_data = Dailypoints::where('date', $date)->first('value'); //$user = User::where('name', 'John')->first();
            if (!empty($points_data)) {
                $new_val = $points_data->value + $data[0]->total_points;
                $inputd['value'] = $new_val;
                Dailypoints::where('date', $date)->update($inputd);
            } else {
                $inputd['date'] = $date;
                $inputd['value'] =  $data[0]->total_points;
                $inputd['user_id'] = $request->user_id;
                Dailypoints::create($inputd);
            }
            $person = Person::where('id', $request->user_id)->first();
            Person::where('id', $request->user_id)->update(['points' => $person->points + $data[0]->total_points]);
        }
        $date = date('Y-m-d');



        Goals::where('id', $goal_id)->update($input);

        $data1 =  Goals::where('trash', 0)->get();
        for ($i = 0; $i < count($data1); $i++) {

            $data1[$i]['percent'] = $data1[$i]->points / $data1[$i]->total_points * 100;
        }

        return  $this->sendResponse($data1, "Success");
        // print_r($data[0]->id);
    }

    public function graph_data(Request $request)
    {
        $data = Dailypoints::get(['value', 'date']);

        return  $this->sendResponse($data, "Success");
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
