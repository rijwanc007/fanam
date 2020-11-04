@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'siscon.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-crop-landscape"></i></span> Add New Sister concern Company</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grade">Mother Company</label>
                        <select class="form-control" name="mcompany" required>
                            @foreach($companies as $company)
                                <option value="{{$company->name}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Company name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="RAK International" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="contact">Tax/Year</label>
                        <input type="number" class="form-control" id="tax" name="tax" placeholder="5%" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
