@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
    <form class="form" method="post" action="{{route('items.store')}}" id="brand-form">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">New Item</span>
                        

                    </div>
                </div>

                <div class="portlet-body form">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Name:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Enter Item Name" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="row">
                        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Category:</label>
                            <div class="input-group col-md-6">
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('size_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Size:</label>
                            <div class="input-group col-md-6">
                                <select class="form-control" name="size_id">
                                    @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="form-group {{$errors->has('color_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Color:</label>
                            <div class="input-group col-md-6">
                                <select class="form-control" name="color_id">
                                    @foreach ($colors as $color)
                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('barcode') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Barcode:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="barcode" placeholder="Item Barcode" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="row">
                        <div class="form-group {{$errors->has('serial') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Serial:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="serial" placeholder="Item serial" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Quantity:</label>
                            <div class="input-group col-md-6">
                                <input type="text" step ="any" id= "qty_val" class="form-control price " name="qty" placeholder="Quantity" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->

                  
                    <div class="row">
                        <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item price:</label>
                            <div class="input-group col-md-6">
                                <input type="number" step ="any" class="form-control price" id="itemprice_val" name="price" placeholder="Item price" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="row">
                        <div class="form-group {{$errors->has('other_costs') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Other Costs:</label>
                            <div class="input-group col-md-6">
                                <input type="number" step ="any" id="othercosts_val" class="form-control price " name="other_costs" placeholder="Item Other Costs" required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->
 
                    <div class="row">
                        <div class="form-group {{$errors->has('profit_percent') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Profit Percent (%): </label>
                            <div class="input-group col-md-6">
                                <input type="number" step ="any" id="profitprice_val" class="form-control price " name="profit_percent" placeholder="Item profit_percent"  required>
                                <span class="col-md-2"> (%): </span>

                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="row">
                        <div class="form-group {{$errors->has('sell_price') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item sell_price:</label>
                            <div class="input-group col-md-6">
                                <input type="number" step ="any" id="sellprice_val" class="form-control " name="sell_price" placeholder="Item Sell Price"  required>
                            </div>
                        </div>
                    </div> <!--- End div row -- -->


                    <div class="form-actions">
                        <button type="submit" class="btn blue">Save</button>
                        <a href="{{route('items.index')}}" class="btn default">Cancel </a> 
                    </div>


                </div> <!---End class portlet-body form -->

        </div> <!-- End class "portlet light -->
        </div> <!-- End class col-md-12 -->

    </form>

@endsection


@push('script')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var qtyval= 0;
            var itempriceval = 0;
            var othercostsval = 0;
            var profitpriceval = 0;
            var sellpriceval = 0;
            var totalpriceval = 0;
            var total_cost = 0;

            $('.price').keyup(function(){
                    
                    itempriceval = Number($('#itemprice_val').val());
                    qtyval = Number($('#qty_val').val());
                    othercostsval = Number($('#othercosts_val').val());
                    profitpriceval = Number($('#profitprice_val').val());
                  //  sellpriceval = Number($('#sellprice_val').val());
                    total_cost = itempriceval+othercostsval;

                    sellpriceval = (total_cost+(total_cost*profitpriceval/100))*qtyval;
                    $('#sellprice_val').val(sellpriceval);
                    
                console.log(total_cost);
                console.log(sellpriceval);
                console.log($('#sellprice_val').val());

            });


        });
    </script>

@endpush