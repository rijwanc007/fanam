@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Sister Concern Companies Collection<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Mother Company</th>
                                        <th> Company</th>
                                        <th> Tax/Year </th>
                                        <th> Collection </th>
                                        <th> Total Tax </th>
                                        <th> Total Collection </th>
                                        <th> Date </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($collections->count() ==! 0)
                                        @foreach($collections as $collection)
                                            <tr>
                                                <td>{{$collection->mcompany}}</td>
                                                <td>{{$collection->name}}</td>
                                                <td>{{$collection->tax}} %</td>
                                                <td>{{$collection->collection}}</td>
                                                <td>{{$collection->totaltax}}</td>
                                                <td>{{$collection->totalcollection}}</td>
                                                <td>{{$collection->date}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('collection.edit',$collection->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                    <div class="modal fade" id="delete_modal_{{$collection->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Collection</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete These Collection.Once You Delete These Company</p>
                                                                    <p>You Will Delete The Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['collection.destroy',$collection->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$collection->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center text-info">{{'No Collection Created Yet'}}</td>
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
