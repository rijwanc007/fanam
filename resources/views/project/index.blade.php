@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Projects<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Project Id </th>
                                        <th>Location</th>
                                        <th> Address </th>
                                        <th> Land Area </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($projects->count() ==! 0)
                                        <?php $j = 0 ; ?>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{$project->id}}</td>
                                                <td>{{$project->location}}</td>
                                                <td>{{$project->address}}</td>
                                                <td>{{$project->larea}} sq feet</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-icon" onclick="window.location='{{route('project.show',$project->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                    <div class="modal fade" id="delete_modal_{{$project->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete project</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete These Project.Once You Delete These Project</p>
                                                                    <p>You Will Delete the Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['project.destroy',$project->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$project->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                                </td>
                                            </tr>
                                            <?php $j++; ?>
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
