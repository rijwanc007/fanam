<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact( 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parea = json_encode($request->parea);
        $status = json_encode($request->status);
        $project = Project::where('location', $request->location)->first();
        if(empty($project)){
            Project::create([
                'location'=>$request->location,
                'address'=>$request->address,
                'larea'=>$request->larea,
                'pcount'=>$request->plotcount,
                'parea'=>$parea,
                'status'=>$status,
            ]);
            Session::flash('success', 'Project Created Successfully');
            return redirect()->route('project.index');
        }
        else{
            Session::flash('error', 'Project is already created at same location');
            return redirect()->route('project.index');
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
        $project = Project::find($id);
        $parea = json_decode($project->parea);
        $status = json_decode($project->status);
        return view('project.show', compact('project',  'parea', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $project = Project::find($id);
//        return view('project.edit', compact('project'));
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
        Project::find($id)->delete();
        Session::flash('success', 'Project Deleted Successfully');
        return redirect()->back();
    }
}
