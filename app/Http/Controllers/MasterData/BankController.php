<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banks = Bank::get()->sortByDesc('created_at');
        return view('master-data-settings.bank.index')->with('banks', $banks);

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
            'bank_name'=>'required|unique:banks,name',
        ]);

        $bank = Bank::where('name',$request->bank_name)->first();

        if($bank){
            $notification = ['unsuccess','Sorry, this bank is already exist!'];
            session()->flash('message', $notification);
            return redirect('/master-data-settings/banks');
        }else{
            $status = Bank::create(['name'=>$request->bank_name]);
            if ($status) {
                $notification = ['success','Bank created successfully'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } else {
                $notification = ['unsuccess','Sorry, could not create Bank'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } 
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
        $bank = Bank::find($id);
        $this->validate($request, [
            'bank_name'=>'required|unique:banks,name,'.$request->id,
        ]);

        if($bank){         
            $status = Bank::where('id',$bank->id)->update(['name'=>$request->bank_name]);
            if ($status) {
                $notification = ['success','Bank updated successfully'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } else {
                $notification = ['unsuccess','Sorry, Could not update Bank'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } 
        }else{
            return redirect('/master-data-settings/banks');
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
        $bank = Bank::find($id);
        if($bank){           
            $status = Bank::where('id',$bank->id)->delete();
            if ($status) {
                $notification = ['success','Bank deleted successfully'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } else {
                $notification = ['unsuccess','Sorry, Could not delete Bank'];
                session()->flash('message', $notification);
                return redirect('/master-data-settings/banks');
            } 
        }else{
            return redirect('/master-data-settings/banks');
        }
    }
}
