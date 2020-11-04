@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-horizontal','route' => 'project.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Project</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Location Address" required>
                    </div>
                    <div class="form-group">
                        <label for="larea">Land Area</label>
                        <input type="text" class="form-control" id="larea" name="larea" placeholder="1800 sq feet" required>
                    </div>
                    <div class="form-group">
                        <label for="plotcount">Number of Plot</label>
                        <input type="text" class="form-control" id="plotcount" name="plotcount" placeholder="10" required>
                    </div>
                    <div class="form-group" id="parea">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Project </button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('input','#plotcount', function (){
            let plotcount = $(this).val();
            let i;
            let html = '';
            for(i=0;i<plotcount;i++){
                html+='<label for="parea">Plot Area ' +(i+1) +'</label>\n' +
                    '  <input type="text" class="form-control" id="" name="parea[]" placeholder="800 sq feet" required>'+
                    '   <input type="hidden" class="form-control" id="" name="status[]" value="unsold" required>'
            }
            $("#parea").append(html)

        })
    </script>
@endsection
