@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Salary Info Of Employees <hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Employee ID </th>
                                        <th> Photo </th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th> Salary </th>
                                        <th> Grade </th>
                                        <th> TA/TD </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($employees->count() ==! 0)
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>{{$employee->id}}</td>
                                                <td><img src="{{asset('assets/images/employees/'.$employee->photo)}}" alt=""></td>
                                                <td>{{$employee->name}}</td>
                                                <td>{{$employee->address}}</td>
                                                <td>{{$employee->salary}}</td>
                                                <td>{{$employee->grade}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-icon" onclick="window.location='{{route('tatd.create',$employee->id)}}'"><i class="mdi mdi-store"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center text-info">{{'No Employee Created Yet'}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
