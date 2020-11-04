@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Sister Concern Companies<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> Employee Id</th>
                                    <th> Location</th>
                                    <th> Plot Area </th>
                                    <th> Price </th>
                                    <th> Customer Name </th>
                                    <th> Customer Address </th>
                                    <th> Customer Phone </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($sells->count() ==! 0)
                                    @foreach($sells as $sell)
                                        <tr>
                                            <td>{{$sell->eid}}</td>
                                            <td>{{$sell->location}}</td>
                                            <td>{{$sell->parea}}</td>
                                            <td>{{$sell->totalprice}} Tk</td>
                                            <td>{{$sell->cname}}</td>
                                            <td>{{$sell->caddress}}</td>
                                            <td>{{$sell->cphone}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-info">{{'No Sells Created Yet'}}</td>
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
