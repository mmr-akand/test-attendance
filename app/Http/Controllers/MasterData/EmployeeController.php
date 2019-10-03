<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Sentinel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->sortByDesc('created_at');
        return view('master-data-settings.employee.index')->with('users', $users);
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
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'password'=>'required'
        ]);

        try{
            $user = User::where('email', $request->email);
            if($user->exists())
                return redirect('/master-data-settings/employees')->with('unsuccess', 'Employee already exist');

            $user_data = Sentinel::registerAndActivate([
                'email'    => $request->email,
                'password' => $request->password,
            ]);

            $role = Sentinel::findRoleBySlug('admin');
            $role->users()->attach($user_data);

            $user_data->name = $request->name;
            $user_data->phone = $request->phone;
            $user_data->status = 'active';
            $user_data->photo = 'images/avater.png';
            $user_data->save();

            return redirect('/master-data-settings/employees')->with('success', 'Employee created successfully'); 
        }catch(\Exception $e){
            dd($e);
            return redirect('/master-data-settings/employees')->with('unsuccess', 'Sorry, Could not create Employee');
        }
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
        $this->validate($request, [
            'email'=>'required|unique:users,email,'.$request->id,
            'name'=>'required',
            'phone'=>'required'
        ]);

        try{
            User::where('id',$request->id)->update(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone]);
            return redirect('/master-data-settings/employees')->with('success', 'Employee updated successfully'); 
        }catch(\Exception $e){
            return redirect('/master-data-settings/employees')->with('unsuccess', 'Sorry, Could not update Employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id);
        
        if(!$user->exists())
            return redirect('/master-data-settings/employees')->with('unsuccess', 'Employee not found');

        $user->delete();
        return redirect('/master-data-settings/employees')->with('success', 'Deleted successfully');
    }
}
