<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\EmployeeDetails;
use App\Models\EmployeeContatct;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::with('details','contact')->where('user_type', false)->get();
        $schedules = Schedule::all();
        return view('employees',compact('employees','schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee = new User;
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->password = bcrypt('dummy123');
        $employee->save();

        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }

        $last_user = User::orderBy('id', 'DESC')->first();

        $image = $request->photo;
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('Employee', $imageName);

        $data = new EmployeeDetails;
        $data->emp_id = $last_user->id;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->photo = $imageName;
        $data->save();

        $data = new EmployeeContatct;
        $data->emp_id = $last_user->id;
        $data->contact_name = $request->contact_name;
        $data->contact_phone = $request->contact_phone;
        $data->save();

        return redirect()->route('employees.index')->with('success','Employee Record has been created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
