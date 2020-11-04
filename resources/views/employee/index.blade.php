@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Employees<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Employee ID </th>
                                        <th>Photo</th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th> Salary </th>
                                        <th> Grade </th>
                                        <th> Option </th>
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
                                                    <button type="button" class="btn btn-inverse-primary btn-icon" onclick="window.location='{{route('employee.show',$employee->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                    <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('employee.edit',$employee->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                    <div class="modal fade" id="delete_modal_{{$employee->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete User</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete These User.Once You Delete These User</p>
                                                                    <p>You Will Delete His/Her Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['employee.destroy',$employee->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$employee->id}}"><i class="mdi mdi-delete-forever"></i></button>
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
