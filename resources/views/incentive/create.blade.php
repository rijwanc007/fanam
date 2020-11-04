@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'incentive.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-percent"></i></span> Add New Incentives</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="incentive">Incentive</label>
                        <select class="form-control" name="incentive" id="incentive" required>
                                <option value="instant">Instant</option>
                                <option value="installment">Installment</option>
                        </select>
                    </div>
                    <div class="form-group" id="month">

                    </div>
                    <div class="form-group">
                        <label for="commision"> Commission </label>
                        <input type="text" class="form-control" id="commission" name="commission" placeholder="10%" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        $(document).on('change','#incentive',function(){
            let incentive = $(this).val();
            if(incentive == 'installment'){
                let html = '';
                html+='<label for="month"> Number of Months</label>\n' +
                    '  <input type="text" class="form-control" id="" name="month" placeholder="12 Months" required>'
                $("#month").append(html)
            }
            else if(incentive == 'instant'){
                $('#month').empty();
            }
        });
    </script>
@endsection
