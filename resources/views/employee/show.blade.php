@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
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
                                        <td class="text-center"><a href="{{asset('assets/images/employees/cv/'. $employee->cv)}}" class="btn btn-inverse-info btn-md" download><i class="mdi mdi-eye"></i></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
