<?php

namespace App\Http\Controllers;

use App\Account;
use App\Employee;
use App\Incentive;
use App\Project;
use App\Sell;
use App\Tatd;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::paginate(20);
        return view('sell.index', compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid,$i)
    {
        $project = Project::find($pid);
        $parea=json_decode($project->parea);
        $incentives = Incentive::all();
        $employees = Employee::all();
        return view('sell.create', compact('project', 'parea','pid','i','incentives', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $i, $pid)
    {
        $tp=$request->price *(int)$request->parea;
        $comsn = ($tp* $request->commission)/100;
        Sell::create([
           'eid'=>$request->eid,
            'location'=>$request->location,
            'address'=>$request->address,
            'parea'=>$request->parea,
            'price'=>$request->price,
            'totalprice'=>$tp,
            'commission'=>$request->commission,
            'cname'=>$request->cname,
            'caddress'=>$request->caddress,
            'cphone'=>$request->cphone,
        ]);
        $project = Project::find($pid);
        $status = json_decode($project->status);
        $status[$i]="sold";
        $statusencode = json_encode($status);
        $project->update([
           'status'=>$statusencode,
        ]);
        $tatd = Account::where('eid', $request->eid)->where('month', date('m'))->where('year', date('yy'))->first();
        $tatd->update([
            'commission'=>$tatd->commission + $comsn,
        ]);
        return redirect()->route('project.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
