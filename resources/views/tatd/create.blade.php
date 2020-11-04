@extends('master')
@section('content')
    @php
        if(!empty($check)){
        if(!empty($ta_td_s)){
            $dates = explode(',',str_replace(str_split('[]""'),'',$ta_td_s->dates));
            $locations = explode(',',str_replace(str_split('[]""'),'',$ta_td_s->location));
          }
        }
    @endphp
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['class' =>'form-sample','route' => 'ta_td_month','method' => 'GET']) !!}
                    <input type="hidden" name="id" value="{{$employee->id}}"/>
                    <div class="form-group">
                        <label for="month">Select Month & Year</label>
                        <input type="month" class="form-control" id="month" name="month" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm btn-block" value="Submit"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-info">Employee<hr/></h3><br/>
                    <div class="text-center"><img src="{{asset('assets/images/employees/'.$employee->photo)}}" width="100" alt=""></div>
                    <br/>
                    <h4>Name : {{$employee->name}}</h4>
                    <h4>Grade : {{$grade->grade}}</h4>
                    <h4>Salary :{{$employee->salary}}</h4>
                    @if(!empty($check))
                    @if(!empty($ta_td_s))
                    <h4>TA/TD : {{$ta_td_s->tatd}}</h4>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(!empty($check))
    <div class="row">
        @if(!empty($ta_td_s))
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">TA/TD Assign These Month & Year : {{$month_year}}</h3><br/>
                    {!! Form::open(['class' =>'form-sample','route' => ['tatd.update',$ta_td_s->id],'method' => 'PATCH']) !!}
                    <div class="row">
                        @for($i=1 ; $i<=$days;$i++)
                            <pre class="tab">
                                    <label for="incentive">Location</label>
                                    <select class="form-control" name="location[]" id="location">
                                        <option @if($locations[$i-1] =="null") selected @endif readonly="" value="null">choose an option</option>
                                        <option value="inside" @if($locations[$i-1]  =="inside") selected @endif>Inside</option>
                                        <option value="outside" @if($locations[$i-1] =="outside") selected @endif>Outside</option>
                                    </select>
                            </pre>
                            <div class="col-md-1">
                                <div class="text-info">
                                    <div class="checkbox">
                                        @if($dates[$i-1] == 0)
                                            <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                        @else
                                            <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" checked/>
                                        @endif
                                        <input type="hidden" id="days_count_{{$i}}" name="date[]" value="{{$dates[$i-1]}}"/>
                                        <label for="styled-checkbox-3"></label>
                                        <span class="check-label-name">{{$i}}</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-success btn-block" value="Update"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @else
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">TA/TD Not Assign These Month & Year : {{$month_year}}</h3>
                        {!! Form::open(['class' =>'form-sample','route' => ['tatd.store'],'method' => 'POST']) !!}
                        <div class="row"><div class="col-md-12 text-center "><h2 class="text-info">Date</h2><hr/></div></div><br/><br/>
                        <div class="row">
                            @for($i=1 ; $i<=$days;$i++)
                                <pre class="tab">
                                <label for="incentive">Location</label>
                                <select class="form-control" name="location[]" id="location">
                                    <option selected readonly="" value="null">choose an option</option>
                                    <option value="inside">Inside</option>
                                    <option value="outside">Outside</option>
                                </select>
                            </pre>
                                <div class="col-md-1">
                                    <div class="text-info">
                                        <div class="checkbox">
                                            <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                            <input type="hidden" id="days_count_{{$i}}" name="date[]" value="0"/>
                                            <label for="styled-checkbox-3"></label>
                                            <span class="check-label-name">{{$i}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <input type="hidden" class="month" name="month" value="{{$month_year}}">
                        <input type="hidden" class="eid" name="eid" value="{{$employee->id}}">
                        <input type="hidden" class="salary" name="salary" value="{{$employee->salary}}">
                        <br/><br/>
                        <input type="submit" class="btn btn-success btn-block" value="Create"/>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
    @endif
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click','.days_check',function(){
            let check = _($(this).data('id')).checked;
            if(check == true){
                _($(this).data('count')).value = 1;
            }
            else if(check == false){
                _($(this).data('count')).value = 0;
            }
        })
    </script>
@endsection
