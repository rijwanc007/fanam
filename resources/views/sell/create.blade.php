@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-horizontal','route' => ['sell.store',$i,$pid],'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Sale </h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="employee">Employee</label>
                        <select class="form-control" name="eid" required>
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{$project->location}}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$project->address}}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="parea">Land Area</label>
                        <input type="text" class="form-control" id="parea" name="parea" value="{{$parea[$i]}} sq feet" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="1000 tk/sqft" required>
                    </div>
                    <div class="form-group">
                        <label for="incentive">Incentive</label>
                        <select class="form-control" name="commission" id="incentive" required>
                            <option selected disabled value="">choose an option</option>
                            @foreach($incentives as $incentive)
                                @if($incentive->incentive == 'instant')
                                    <option value="{{$incentive->commission}}">{{$incentive->incentive}}</option>
                                @else
                                    <option value="{{$incentive->commission}}">{{$incentive->incentive}}  {{$incentive->month}} Month</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cname">Customer name</label>
                        <input type="text" class="form-control" id="cname" name="cname" required>
                    </div>
                    <div class="form-group">
                        <label for="caddress">Customer Address</label>
                        <input type="text" class="form-control" id="caddress" name="caddress" required>
                    </div>
                    <div class="form-group">
                        <label for="cphone">Customer Phone</label>
                        <input type="text" class="form-control" id="cphone" name="cphone" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Sale </button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
