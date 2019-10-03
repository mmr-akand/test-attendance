<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function show(){
    	$user = Sentinel::getUser();
    	$data = [
            'title'=>'Profile',
            'user'=>$user
        ];
    	return view('profile', $data);
    }

    public function save( Request $request ){
        $sentinel_user = Sentinel::getUser();
        $user = User::where('id', $sentinel_user->id)->first();
        $user->update($request->all());

        return redirect('/profile');
    }

    public function changePassword( Request $request ){
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        $sentinel_user = Sentinel::getUser();

        if( ! Hash::check( $request->current_password, $sentinel_user->password ) )
            return redirect('/profile')->with('unsuccess', 'Your old password is incorrect');

        $new_password = Hash::make($request->new_password);
        
        try{
            User::where('id', $sentinel_user->id)->update(['password' => $new_password]);
            return redirect('/profile')->with('success', 'Password successfully changed');
            
        }catch(\Exception $e){
            return redirect('/profile')->with('unsuccess', 'An error occurred to change password');
        }
    }

    public function changePhoto( Request $request ){
        if( !$request->hasFile('avater-file') ) {
            return response()->json(['success' => FALSE]);
        }

        $res = $this->uploader( $request );
        if( !$res ) {
            return response()->json(['success' => FALSE]);
        }

        $sentinel_user = Sentinel::getUser();
        $user = User::where('id', $sentinel_user->id);
        $user->update(['photo' => $res['path']]);
        
        return response()->json(['success' => TRUE]);
    }

    public static function uploader( Request $request )
    {
        $original_name = $request->file('avater-file')->getClientOriginalName();
        $exploded = explode('.', $original_name);
        $extention = array_pop($exploded);
        
        if(!($extention=='png' || $extention=='jpg' || $extention=='jpeg')){
            return false;
        }

        try{
            $uniq_name = uniqid('file').mt_rand(1000000000, 9999999999).'.'.$extention;
            $request->file('avater-file')->move(base_path('public').'/avaters', $uniq_name);
            
        }catch(\Exception $e){
            return false;
        }

        return [
            'path' => 'avaters/'.$uniq_name,
        ];
    }

}
