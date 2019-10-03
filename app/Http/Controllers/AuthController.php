<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\UserLib\Login\LoginManager;
use Sentinel;

class AuthController extends Controller
{
    public function loginPage()
    {
    	return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;

        $login_manager = new LoginManager();
        $login_user = $login_manager->login( $email, $password );

        if( !$login_user ){
            return redirect('/')->with('unsuccess', 'Incorrect email or password');
        }

        $res = $login_manager->complete( $request );
        
        return redirect('/dashboard');
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
}
