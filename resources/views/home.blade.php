@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-home"></i></span> Dashboard </h3><br/><br/></div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('project.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Projects <i class="mdi mdi-projector menu-icon mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{count($projects)}}</h2>
                        <h6 class="card-text">Total Plots : {{$projects->sum('larea')}} sq feet</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-dark card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('company.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Companies  <i class="mdi mdi-power-socket-us menu-icon mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{count($companies)}}</h2>
                        <h6 class="card-text">Sister Concern Companies : {{count($siscompanies)}}</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('collection.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Collections <i class="mdi mdi-currency-usd mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">Collection/Year</h2>
                        <h6 class="card-text">{{$collections->sum('totalcollection')}} Tk</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('employee.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Employees <i class="mdi mdi-account menu-icon mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{count($employees)}}</h2>
                        <h6 class="card-text">Employees have different grades</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('incentive.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Incentives<i class="mdi mdi-inbox menu-icon mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{count($incentives)}}</h2>
                        <h6 class="card-text">For Employees based on their sales</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('sell.index')}}" style="color: white; text-decoration: none;">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Sells<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">Plots sold: {{count($sells)}}</h2>
                        <h6 class="card-text">Total sell : {{$sells->sum('totalprice')}} Tk</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
