<?php

namespace App\Http\Controllers;

use App\Company;
use App\SisCon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SisterconcernController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siscons = SisCon::paginate(20);
        return view('siscon.index', compact('siscons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('siscon.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siscon = SisCon::where('name', $request->name)->first();
        if(empty($siscon)){
            SisCon::create([
               'mcompany'=>$request->mcompany,
               'name'=>$request->name,
               'address'=>$request->address,
               'tax'=>$request->tax,
            ]);
            Session::flash('success', 'Compnay is created successfully');
            return redirect()->route('siscon.index');
        }
        else{
            Session::flash('error', 'Compnay with this name is already created');
            return redirect()->back();
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
        $siscon = SisCon::find($id);
        return view('siscon.edit', compact('siscon'));
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
        $siscon = SisCon::find($id);
        $siscon->update([
            'mcompany'=>$request->mcompany,
            'name'=>$request->name,
            'address'=>$request->address,
            'tax'=>$request->tax,
        ]);
        Session::flash('success', 'Compnay information updated successfully');
        return redirect()->route('siscon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SisCon::find($id)->delete();
        Session::flash('Success', 'Company deleted Succesfully');
        return redirect()->route('siscon.index');
    }
    public function sisterConcern($company){
        $sister_concern = SisCon::where('mcompany',$company)->get();
        return response()->json($sister_concern);
    }
    public function tax($sister_concern){
        $tax = SisCon::where('name',$sister_concern)->first();
        return response()->json($tax);
    }
}
