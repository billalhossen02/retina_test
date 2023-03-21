<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if(auth()->user()->user_type == true){
           return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('employee.index');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address Or Password is Wrong.');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
