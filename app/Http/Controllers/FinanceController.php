<?php

namespace App\Http\Controllers;

use App\Models\Dailypoints;
use App\Models\Finance;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //
    public function finaces(Request $request)
    {
        $data =  Finance::where('user_id', $request->user_id)->get();

        return response()->json([
            "data" => $data
        ]);
    }
    public function test(Request $request)
    {
        $dt = '2024-03-28';
        $date = Carbon::create($dt);

        $tasks  = Task::where('id', 11)->first();
        $updated = Carbon::create($tasks->updated_at);
        if ($updated->lt($date)) {
            $tasks->duration = $tasks->duration + 1;
        }

        return $tasks;
    }

    public function add_payment(Request $request)
    {

        $input['user_id'] = $request->user_id;
        $input['payment_type'] = $request->payment_type;
        $input['amount'] = $request->amount;
        $input['date'] = $request->date;

        $data =  Finance::create($input);

        return response()->json([
            "data" => $data
        ]);
    }
}