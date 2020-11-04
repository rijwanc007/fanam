@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Search account history by Month & Year <hr/></h2>
                    {!! Form::open(['class' =>'form-sample','route' => 'employee.accounts','method' => 'GET']) !!}
                    <input type="hidden" name="id" value="{{$employee->id}}"/>
                    <div class="form-group">
                        <label for="month">Select Month & Year</label>
                        <input type="month" class="form-control" id="month" name="month" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm btn-block" value="Submit"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center text-info">Information<hr/></h3><br/>
                            <div class="text-center"><img src="{{asset('assets/images/employees/'.$employee->photo)}}" width="100" alt=""></div>
                            <br/>
                            <div class="text-center">
                                <table class="table table-responsive">
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">CV</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{$employee->name}}</td>
                                        <td class="text-center">{{$employee->address}}</td>
                                        <td class="text-center">{{$employee->contact}}</td>
                                        <td class="text-center"><a href="{{asset('assets/images/employees/cv/'. $employee->cv)}}" class="btn btn-inverse-info btn-md" target="_blank"><i class="mdi mdi-eye"></i></a></td>
{{--                                        <td class="text-center"><a href="{{asset('assets/images/employees/cv/'. $employee->cv)}}" class="btn btn-inverse-info btn-md" download><i class="mdi mdi-eye"></i></a></td>--}}
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($account))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Employee Accounts for {{$account->month}}/{{$account->year}}<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Salary</th>
                                        <th> Commission </th>
                                        <th> TA/TD </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <tr class="text-center">
                                                <td>{{$account->salary}}</td>
                                                <td>
                                                    @if(empty($account->commission))
                                                    <button type="button" class="btn btn-danger btn-block">Employee have not sold any plot in {{$account->month}}/{{$account->year}}</button>
                                                    @else
                                                    {{$account->commission}}
                                                    @endif
                                                </td>
                                                <td>{{$account->tatd}}</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-block">Accounts for that month is not available</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
