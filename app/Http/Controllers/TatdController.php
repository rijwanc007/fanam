<?php

namespace App\Http\Controllers;

use App\Account;
use App\Employee;
use App\Grade;
use App\Tatd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TatdController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(20);
        return view('tatd.index', compact('employees'));
    }
    public function create($id)
    {
        $employee = Employee::find($id);
        $grade = Grade::where('grade', $employee->grade)->first();
        $total = $employee->salary + $employee->commision;
        return view('tatd.create', compact('employee', 'total', 'grade'));
    }
    public function store(Request $request)
    {
        $explode = explode('-',$request->month);
        $month = $explode[1];
        $year = $explode[0];
        $dates =$request->date;
        $locations = $request->location;
        $var = json_encode($request->date);
        $loc = json_encode($request->location);
        $employee =Employee::find($request->eid);
        $inside = Grade::where('grade',$employee->grade)->where('location', 'inside')->first();
        $outtotal =Grade::where('grade',$employee->grade)->where('location', 'outside')->first();
        $tamount = 0;
        for ($i=0;$i<count($dates);$i++){
            if($dates[$i] ==1 && $locations[$i] == 'inside'){
                $tamount += $inside->total;
            }
            elseif($dates[$i] == 1 && $locations[$i] == 'outside'){
                $tamount += $outtotal->total;
            }
        }
        $account = Account::where('eid',$request->eid)->where('month', $month)->where('year', $year)->first();
                if (!empty($account)) {
                    $account->update([
                        'salary' => $request->salary,
                        'dates' => $var,
                        'location' => $loc,
                        'tatd' => $tamount,
                    ]);
                }
                else{
                    Account::create([
                        'eid'=>$request->eid,
                        'month' => $month,
                        'year' => $year,
                        'salary' => $request->salary,
                        'dates' => $var,
                        'location' => $loc,
                        'tatd' => $tamount,
                    ]);
                }


        Session::flash('success', 'Tatd Added Successfully');
        return redirect()->route('tatd.create', $request->eid);
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $dates =$request->date;
        $locations = $request->location;
        $employee =Employee::find($account->eid);
        $inside = Grade::where('grade',$employee->grade)->where('location', 'inside')->first();
        $outtotal =Grade::where('grade',$employee->grade)->where('location', 'outside')->first();
        $tamount = 0;
        for ($i=0;$i<count($dates);$i++){
            if($dates[$i] ==1 && $locations[$i] == 'inside'){
                $tamount += $inside->total;
            }
            elseif($dates[$i] == 1 && $locations[$i] == 'outside'){
                $tamount += $outtotal->total;
            }
        }
        $var = json_encode($request->date);
        $loc = json_encode($request->location);
        $account->update([
           'dates'=>$var,
            'location'=>$loc,
            'month'=>$account->month,
            'year'=>$account->year,
            'tatd'=>$tamount,
        ]);
        Session::flash('success', 'Tatd Updated Successfully');
        return redirect()->route('tatd.create', $account->eid);

    }
    public function destroy($id)
    {
        //
    }
    public function taTdMonth(Request $request){
        $month_year = $request->month;
        $explode = explode('-',$request->month);
        $month = $explode[1];
        $year = $explode[0];
        $employee = Employee::find($request->id);
        if($year > $employee->created_at->format('yy') || ($year == $employee->created_at->format('yy') && $month >= $employee->created_at->format('m'))){
            $ta_td_s = Account::where('eid',$request->id)->where('year',$year)->where('month',$month)->first();
               $grade = Grade::where('grade', $employee->grade)->first();
               $total = $employee->salary + $employee->commision;
               $check = 1;
               $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
               return view('tatd.create', compact('employee', 'total', 'grade','ta_td_s','check','month_year','days'));
        }else{
            Session::flash('error','Invalid Month & Year');
            return redirect()->back();
        }
    }
}
