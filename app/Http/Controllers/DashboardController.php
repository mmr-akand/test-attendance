<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class DashboardController extends Controller
{
    public function dashboard(){

    	$data = [
            'title'=>'Dashboard',
        ];
    	return view('dashboard', $data);
    }
}
