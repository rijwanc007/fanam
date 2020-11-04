@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-horizontal','route' => 'grade.store','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Grade</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="A" required>
                    </div>
                    <div class="form-group">
                        <label for="incentive">Location</label>
                        <select class="form-control" name="location" id="location" required>
                            <option selected disabled value="">choose an option</option>
                            <option value="inside">Inside</option>
                            <option value="outside">Outside</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="food">Food</label>
                        <input type="number" class="form-control" id="food" name="food" placeholder="100 Tk" required>
                    </div>
                    <div class="form-group">
                        <label for="travel">Travel</label>
                        <input type="number" class="form-control" id="travel" name="travel" placeholder="100 Tk" required>
                    </div>
                    <div class="form-group" id="hloc">

                    </div>
                    <div class="form-group">
                        <label for="others">Others</label>
                        <input type="number" class="form-control" id="others" name="others" placeholder="100 Tk">
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" name="total" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Grade </button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#location', function (){
           let location = $(this).val();
           let html='';
           if(location == 'outside'){
               html+='<label for="hotel">Hotel</label>\n' +
                   '  <input type="number" class="form-control" id="hotel" name="hotel" placeholder="100 Tk">'
                   $("#hloc").append(html)

               $(function(){
                   $('#food, #travel,#hotel, #others').keyup(function(){
                       var value1 = parseFloat($('#food').val()) || 0;
                       var value2 = parseFloat($('#travel').val()) || 0;
                       var value3 = parseFloat($('#hotel').val()) || 0;
                       var value4 = parseFloat($('#others').val()) || 0;
                       $('#total').val(value1 + value2 + value3+value4);
                   });
               });
           }
           else if(location == 'inside'){
               $('#hloc').empty();
               $(function(){
                   $('#food, #travel, #others').keyup(function(){
                       var value1 = parseFloat($('#food').val()) || 0;
                       var value2 = parseFloat($('#travel').val()) || 0;
                       var value3 = parseFloat($('#others').val()) || 0;
                       $('#total').val(value1 + value2 + value3);
                   });
               });
           }
        });
        // $(document).on('keyup', '#food', function (){
        //     let food = $(this).val();
        //     let total = _('total').value;
        //     _('total').value = total + food;
        // })
        // $(document).on('keyup', '#travel', function (){
        //     let travel = $(this).val();
        //     let total = _('total').value;
        //     total = total + travel;
        //     console.log(total);
        // })

    </script>
@endsection
