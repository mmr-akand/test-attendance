<?php

namespace App\Libraries\UserLib\Login;

use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use Sentinel;

class LoginManager
{
	protected $user = null;
	protected $error;

	public function login( $email, $password )
	{
		$cred_res = $this->checkCredentials( $email, $password );
		if( $cred_res == false )
			return false;

		return $this->user->first();
	}

	private function checkCredentials( $email, $password )
	{
		$user = User::where('email', $email);

		if( !$user->exists() ){
	    	$this->error['message'] = 'Incorrect email / password';
			$this->error['type'] = 'incorrect_login';
			return false;
		}else if( ! Hash::check( $password, $user->first()->password ) ){
	    	$this->error['message'] = 'Incorrect email / password';
			$this->error['type'] = 'incorrect_login';
			return false;
		}
		$this->user = $user;
		return true;
	}

    public function complete( $request ){
        
    	$credentials = [
		    'email'    => request('email'),
		    'password' => request('password'),
		];
		$user = Sentinel::authenticate($credentials);

		$sentinel_role = Sentinel::findRoleBySlug('admin');
		$user->inRole($sentinel_role);
		
		return true;
    }

	public function getError() {
		return $this->error;
	}
}