<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = Grade::where('grade', $request->grade)->where('location', $request->location)->first();
        if(empty($grade)){
            Grade::create([
                'grade'=>$request->grade,
                'location'=>$request->location,
                'food'=>$request->food,
                'travel'=>$request->travel,
                'hotel'=>$request->hotel,
                'others'=>$request->others,
                'total'=>$request->total,
            ]);
            Session::flash('success', 'Grade created Successfully');
            return redirect()->route('grade.index');
        }
        else{
            Session::flash('error', 'This grade is already created');
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
        $grade = Grade::find($id);
        return view('grade.edit', compact('grade'));
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
        $grade = Grade::find($id);
        $grade->update([
            'grade'=>$request->grade,
            'food'=>$request->food,
            'travel'=>$request->travel,
            'others'=>$request->others,
            'total'=>$request->total,
        ]);
        Session::flash('success', 'Grade is updated Successfully');
        return redirect()->route('grade.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
        return redirect()->back();
    }
}
