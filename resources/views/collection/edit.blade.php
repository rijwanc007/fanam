@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['collection.update', $collection->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-currency-usd"></i></span> Edit Collection</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grade">Mother Company</label>
                        <select class="form-control" name="mcompany" id="select1" required>
                            <option selected disabled value="">choose an option</option>
                            @foreach($companies as $company)
                                <option value="{{$company->name}}" @if($collection->mcompany == $company->name) selected @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grade">Sister company</label>
                        <select class="form-control" name="siscon" id="select2" required>
                            <option value="{{$collection->name}}">{{$collection->name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact">Tax/Year</label>
                        <input type="text" class="form-control" id="tax" name="tax" value="{{$collection->tax}}" readonly  required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Collection</label>
                        <input type="number" class="form-control collection" id="collection" name="collection" value="{{$collection->collection}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Month & Year</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$collection->date}}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Total Tax</label>
                        <input type="number" class="form-control" id="totaltax" name="totaltax" value="{{$collection->totaltax}}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Collection After tax</label>
                        <input type="number" class="form-control" id="collectionat" name="collectionat" value="{{$collection->totalcollection}}" readonly  required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-currency-usd"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change','#select1',function(){
            _('tax').value = '';
            document.getElementsByClassName('collection')[0].value = '';
            _('totaltax').value = '';
            _('collectionat').value = '';
            let company = $(this).val();
            $.ajax({
                url : '/sister_concern/' + company,
                method : 'GET',
                success:function(data){
                    $('#select2').empty();
                    $('#select2').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#select2').append("<option value='"+ value.name + "'>" + value.name + "</option>");
                    });
                }
            });
        });
        $(document).on('change','#select2',function(){
            document.getElementsByClassName('collection')[0].value = '';
            _('totaltax').value = '';
            _('collectionat').value = '';
            let sister_concern = $(this).val();
            $.ajax({
                url : '/sister_concern_tax/' + sister_concern,
                method : 'GET',
                success:function (data){
                    _('tax').value = data.tax;
                }
            });
        });
        $(document).on('input','#collection',function(){
            let tax = _('tax').value;
            let collection = $(this).val();
            let result ;
            result = (collection * tax)/100;
            let collectionat = collection - result;
            _('totaltax').value = result;
            _('collectionat').value = collectionat;
        })
    </script>
@endsection
