@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Location : {{$project->location}}</h2>
                        <h2 class="text-center">Address : {{$project->address}}</h2>
                        <h2 class="text-center">Land Area : {{$project->larea}} sq feet</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"><div class="col-md-12"><h2 class="text-center text-info">Plots<hr/></h2></div></div>
        <div class="row">
            @for($i = 0 ; $i < $project->pcount ; $i++)
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body text-center">
                            @if($status[$i] == "unsold")
                                <button type="button" class="btn btn-inverse-success"  onclick="window.location='{{route('sell.create',[$project->id,$i ])}}'">{{$parea[$i]}} sq feet</button>
                            @else
                                <button type="button" class="btn btn-inverse-danger" data-toggle="tooltip" title="Sold!" onclick="window.location='#' ">{{$parea[$i]}} sq feet</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection