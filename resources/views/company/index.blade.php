@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Companies<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Address </th>
                                    <th> Contact </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($companies->count() ==! 0)
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->address}}</td>
                                            <td>{{$company->contact}}</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('company.edit',$company->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$company->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Company</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete These Company.Once You Delete These Company</p>
                                                                <p>You Will Delete The Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['company.destroy',$company->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$company->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'No Copamnies Created Yet'}}</td>
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
@endsection
