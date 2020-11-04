@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['siscon.update',$siscon->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Edit Company</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="mcompany">Mothe Company</label>
                        <input type="text" class="form-control" id="mcompany" name="mcompany" value="{{$siscon->mcompany}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Company name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$siscon->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$siscon->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tax">Tax/year</label>
                        <input type="number" class="form-control" id="tax" name="tax" value="{{$siscon->tax}}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
