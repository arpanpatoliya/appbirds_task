<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $data)
    {
        try {
          if (Auth::attempt(['email' => $data->email , 'password' => $data->password])) {
            return redirect('/deshbord');
          }  
          else {
            echo 'not found';
          }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/');
        } catch (\Exception $ex) {
            
        }
    }
}
