@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['grade.update',$grade->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>Edit Grade</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" value="{{$grade->grade}}" required>
                    </div>
                    <div class="form-group">
                        <label for="food">Food</label>
                        <input type="text" class="form-control" id="food" name="food" value="{{$grade->food}}" required>
                    </div>
                    <div class="form-group">
                        <label for="travel">Travel</label>
                        <input type="text" class="form-control" id="travel" name="travel" value="{{$grade->travel}}" required>
                    </div>
                    <div class="form-group">
                        <label for="others">Others</label>
                        <input type="text" class="form-control" id="others" name="others" value="{{$grade->others}}" required>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" value="{{$grade->total}}" name="total">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Update Grade </button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        $(function(){
            $('#food, #travel, #others').keyup(function(){
                var value1 = parseFloat($('#food').val()) || 0;
                var value2 = parseFloat($('#travel').val()) || 0;
                var value3 = parseFloat($('#others').val()) || 0;
                $('#total').val(value1 + value2 + value3);
            });
        });

    </script>
@endsection
