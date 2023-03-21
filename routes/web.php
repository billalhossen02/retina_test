<?php

use App\Models\User;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->group(function () {

Route::get('employees_dashboard',function(){
    $attendances = Attendance::where('emp_id',Auth()->user()->id)->get();
    $employee = User::where('id', Auth()->user()->id)->first();
    return view('employee.index',compact('attendances','employee'));
})->name('employee.index');

Route::get('employee-report',function(){
    return view('employee.report')->with(['employee' => User::where('id', Auth()->user()->id)->first()]);
});

Route::get('dashboard',[HomeController::class, 'index'])->name('dashboard');
Route::get('logout',[HomeController::class, 'logout'])->name('logout');

Route::resource('employees', EmployeeController::class);

Route::get('attendance',function(){
    $employees = User::where('user_type', false)->get();
    $schedules = Schedule::all();
    return view('attendance',compact('employees','schedules'));
});

Route::get('attendance-log', '\App\Http\Controllers\CheckController@index')->name('attendance-log');
Route::get('sheet-report', '\App\Http\Controllers\CheckController@sheetReport')->name('sheet-report');
Route::post('check-store','\App\Http\Controllers\CheckController@CheckStore')->name('check_store');

Route::get('schedules',function(){
    $schedules = Schedule::all();
    return view('schedule',compact('schedules'));
});
Route::post('add/schedule',function(Request $request){
    $data = new Schedule;
    $data->slug = $request->name;
    $data->time_in = $request->time_in;
    $data->time_out = $request->time_out;
    $data->save();

    return redirect()->back()->with('success','Schedule Record has been created successfully !');
})->name('schedule.store');

});

Route::post('login',[HomeController::class, 'postLogin'])->name('postLogin');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


