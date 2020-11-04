@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h2 class="text-center text-info">Incentives<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> Incentive</th>
                                            <th> Commission</th>
                                            <th> Months</th>
                                            <th> Option </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($incentives->count() ==! 0)
                                            @foreach($incentives as $incentive)
                                                <tr class="text-center">
                                                    <td>{{$incentive->incentive}}</td>
                                                    <td>{{$incentive->commission}} %</td>
                                                    <td>
                                                    @if($incentive->month == null)
                                                    <button type="button" class="btn btn-danger btn-block">Instant Cash Payment</button>
                                                    @else
                                                    {{$incentive->month}}</td>
                                                    @endif
                                                    <td>
                                                        <div class="modal fade" id="delete_modal_{{$incentive->id}}" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Delete incentive</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are You Want To Delete These incentive.Once You Delete These incentive</p>
                                                                        <p>You Will Delete The Information Permanently</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        {!! Form::open(['route' => ['incentive.destroy',$incentive->id],'method' => 'DELETE']) !!}
                                                                        <button type="submit" class="btn btn-success">submit</button>
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$incentive->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center text-info">{{'No Incentive Created Yet'}}</td>
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
    </div>
@endsection
