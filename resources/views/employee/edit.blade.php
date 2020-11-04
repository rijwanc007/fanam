@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['employee.update', $employee->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Edit Employee</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Upload Photo</label>
                        <input type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="{{$employee->contact}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >CV/Resume</label>
                        <input type='file' id="cv" name="cv" accept=".pdf" />
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{$employee->salary}}" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <select class="form-control" name="grade" required>
                            @foreach($grades as $grade)
                                <option value="{{$grade->grade}}" @if($grade->grade == $employee->grade) selected @endif>{{$grade->grade}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Employee </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
