<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use App\Models\Attendance;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('attendance_log')->with(['attendances' => Attendance::all(), 'leaves' => Leave::all()]);
    }
    public function CheckStore(Request $request)
    {
        if (isset($request->attd)) {
            foreach ($request->attd as $keys => $values) {
                foreach ($values as $key => $value) {
                    if ($employee = User::whereId(request('emp_id'))->first()) {
                        if (
                            !Attendance::whereAttendance_date($keys)
                                ->whereEmp_id($key)
                                ->whereType(0)
                                ->first()
                        ) {
                            $data = new Attendance();

                            $data->emp_id = $key;
                            $emp_req = User::whereId($data->emp_id)->first();
                            if($request->time_in != null){
                                $data->attendance_time = $request->time_in;
                            }
                            else{
                            $data->attendance_time = date('H:i:s', strtotime($emp_req->schedules->first()->time_in));
                            }
                            $data->attendance_date = $keys;

                            $emps = date('H:i:s', strtotime($employee->schedules->first()->time_in));
                            if (!($emps > $data->attendance_time)) {
                                $data->status = 0;

                            }
                            $data->save();
                        }
                    }
                }
            }
        }
        if (isset($request->leave)) {
            foreach ($request->leave as $keys => $values) {
                foreach ($values as $key => $value) {
                    if ($employee = User::whereId(request('emp_id'))->first()) {
                        if (
                            !Leave::whereLeave_date($keys)
                                ->whereEmp_id($key)
                                ->whereType(1)
                                ->first()
                        ) {
                            $data = new Leave();
                            $data->emp_id = $key;
                            $emp_req = User::whereId($data->emp_id)->first();
                            if($request->time_out != null){
                                $data->leave_time = $request->time_out;
                            }
                            else{
                            $data->leave_time = $emp_req->schedules->first()->time_out;
                            }
                            $data->leave_date = $keys;
                            if ($employee->schedules->first()->time_out <= $data->leave_time) {
                                $data->status = 1;
                            }

                            $data->save();
                        }
                    }
                }
            }
        }
        return back()->with('Success', 'You have successfully submited the attendance !');
    }

    public function sheetReport()
    {
    return view('report')->with(['employees' => User::where('user_type', false)->get()]);
    }
}
