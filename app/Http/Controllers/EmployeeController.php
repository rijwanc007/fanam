<?php

namespace App\Http\Controllers;

use App\Account;
use App\Employee;
use App\Grade;
use App\Tatd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(20);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::distinct()->get(['grade']);
        return view('employee.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = $request->file('photo');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/images/employees/',$document_name);
        $cv = $request->file('cv');
        $cv_name = rand().'.'.$cv->getClientOriginalExtension();
        $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);

        $employee = Employee::create([
           'name'=>$request->name,
            'photo'=>$document_name,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'cv'=>$cv_name,
            'salary'=>$request->salary,
            'grade'=>$request->grade,
        ]);

        Account::create([
            'eid'=>$employee->id,
            'month'=>date('m'),
            'year'=>date('yy'),
        ]);

        Session::flash('success', 'Employee created Successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $grades = Grade::all();
        return view('employee.edit', compact('employee', 'grades'));
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
        $employee = Employee::find($id);
        $d = Employee::find($id);
        if(!empty($request->file('photo')) && !empty($request->file('cv'))){
            $document = $request->file('photo');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $cv = $request->file('cv');
            $cv_name = rand().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);

            $employee->update([
                'name'=>$request->name,
                'photo'=>$document_name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'cv'=>$cv_name,
                'salary'=>$request->salary,
                'grade'=>$request->grade,
            ]);
            unlink('assets/images/employees/'.$d->photo);
            unlink('assets/images/employees/cv/'.$d->cv);
        }
        elseif(!empty($request->file('photo')) && empty($request->file('cv'))){
            $document = $request->file('photo');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $employee->update([
                'name'=>$request->name,
                'photo'=>$document_name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'salary'=>$request->salary,
                'grade'=>$request->grade,
            ]);
            unlink('assets/images/employees/'.$d->photo);
        }
        elseif(empty($request->file('photo')) && !empty($request->file('cv'))){
            $cv = $request->file('cv');
            $cv_name = rand().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);
            $employee->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'cv'=>$cv_name,
                'salary'=>$request->salary,
                'grade'=>$request->grade,
            ]);
            unlink('assets/images/employees/cv/'.$d->cv);
        }
        else{
            $employee->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'salary'=>$request->salary,
                'grade'=>$request->grade,
            ]);
        }
        Session::flash('success', 'Employee profile updated succesfully');
        return redirect()->route('employee.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        unlink('assets/images/employees/'.$employee->photo);
        unlink('assets/images/employees/cv/'.$employee->cv);
        $employee->delete();
        Session::flash('success', 'Employee profile Deleted succesfully');
        return redirect()->route('employee.index');
    }
    public function accounts(Request $request)
    {
        $explode = explode('-',$request->month);
        $month = $explode[1];
        $year = $explode[0];
        $employee = Employee::find($request->id);
        $account = Account::where('eid', $request->id)->where('month', $month)->where('year', $year)->first();
        return view('employee.show', compact('account', 'employee'));

    }
}
