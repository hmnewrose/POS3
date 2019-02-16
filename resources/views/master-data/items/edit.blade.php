@extends('layouts.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
<form class="form" method="post" action="{{route('items.update',['id'=>$item->id])}}" >
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Edit {{$item->name}}</span>
                </div>
            </div> <!---- End portlet-title ----->

            <div class="portlet-body form">
                @csrf
                @method('PUT')

                <div class="input-group col-md-6">
                    <!-- <div class="panel panel-primary">
                        <div class="panel-heading">Item</div>
                            <div class="panel-body"> -->
                                <div class="row">
                                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Name : </label>
                                        <div class="input-group col-md-6">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Item Name" value="{{$item->name}}" required>
                                        </div>
                                    </div>
                                </div> <!---- End row ----->

                            <div class="row">
                                <label class="col-md-2">Category: </label>
                                <div class="input-group col-md-6">
                                    <select class="form-control" name="category_id" placeholder="Select category">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $item->category_id == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <!---- End row ----->
<br/>



                            <div class="row">
                                <label class="col-md-2">Size : </label>
                                <div class="input-group col-md-6">
                                    <select class="form-control" name="size_id" placeholder="Select Size">
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}" {{ $item->size_id == $size->id ? "selected" : ""}}>{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <!---- End row ----->
<br />

                            <div class="row">
                                <label class="col-md-2">Colors : </label>
                                <div class="input-group col-md-6">
                                    <select class="form-control" name="color_id" placeholder= "Select Color">
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}" {{ $item->color_id == $color->id ? "selected" : ""}}>{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <!---- End row ----->

<br/>
                            <div class="row">
                                <div class="form-group {{$errors->has('barcode') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Barcode : </label>
                                        <div class="input-group col-md-6">
                                            <input type="text"  class="form-control" name="barcode" placeholder="Enter Item barcode" value="{{$item->barcode}}" >
                                        </div>
                                </div>
                            </div> <!---- End row ----->


                            <div class="row">
                                <div class="form-group {{$errors->has('serial') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Serial : </label>
                                        <div class="input-group col-md-6">
                                            <input type="text" class="form-control" name="serial" placeholder="Enter Item Serial" value="{{$item->serial}}" >
                                        </div>
                                </div>
                            </div> <!---- End row ----->
                          
                            <div class="row">
                                <div class="form-group {{$errors->has('qty') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Qty : </label>
                                        <div class="input-group col-md-6">
                                            <input type="number" id="qty_val" step="any" class="form-control price" name="qty" placeholder="Enter Item Quantity" value="{{$item->qty}}" required>
                                        </div>
                                </div>
                            </div> <!---- End row ----->

                            <div class="row">
                                <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Price : </label>
                                        <div class="input-group col-md-6">
                                            <input type="number" id="itemprice_val" step="any" class="form-control price" name="price" placeholder="Enter Item Price" value="{{$item->price}}" required>
                                        </div>
                                </div>
                            </div> <!---- End row ----->

                            <div class="row">
                                <div class="form-group {{$errors->has('other_costs') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Other Costs : </label>
                                        <div class="input-group col-md-6">
                                            <input type="number" id="othercosts_val" step="any" class="form-control price" name="other_costs" placeholder="Enter Item other_costs" value="{{$item->other_costs}}">
                                        </div>
                                </div>
                            </div> <!---- End row ----->

                            <div class="row">
                                <div class="form-group {{$errors->has('profit_percent') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Profit Percent : </label>
                                        <div class="input-group col-md-6">
                                            <input type="number" step="any" id="profitprice_val" class="form-control price" name="profit_percent" placeholder="Enter Item Profit Percent" value="{{$item->profit_percent}}">
                                        </div>
                                </div>
                            </div> <!---- End row ----->


                            <div class="row">
                                <div class="form-group {{$errors->has('sell_price') ? 'has-error' : ''}}">
                                        <label class="col-md-2">Sell Price : </label>
                                        <div class="input-group col-md-6">
                                            <input type="number" step="any" id="sellprice_val" class="form-control" name="sell_price" placeholder="Enter Item Sell Price" value="{{$item->sell_price}}">
                                        </div>
                                </div>
                            </div> <!---- End row ----->



                            <!-- </div>  End panel-body -->
                       <!-- </div>  End panel-heading -->
                    <!-- </div> End panel panel-primary -->
               


                <div class="form-actions">
                    <button type="submit" class="btn blue">Save </button>
                    <a href="{{route('items.index')}}" class="btn default">Cancel </a>
                </div>

                </div>   <!-- End input-group --> 
            </div> <!---- End portlet-body form ----->




        </div> <!---- End portlet light ----->
    </div> <!---- End col-md-12 ----->
            
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
                    
                var ttsellprice = 0;
                ttsellprice = totalsellpricefun();
                $('#sellprice_val').val(ttsellprice);

            });

            function totalsellpricefun()
            {
                itempriceval = Number($('#itemprice_val').val());
                    qtyval = Number($('#qty_val').val());
                    othercostsval = Number($('#othercosts_val').val());
                    profitpriceval = Number($('#profitprice_val').val());
                  //  sellpriceval = Number($('#sellprice_val').val());
                    total_cost = itempriceval+othercostsval;

                    sellpriceval = (total_cost+(total_cost*profitpriceval/100))*qtyval;
                    $('#sellprice_val').val(sellpriceval);
                    return sellpriceval();
                console.log(total_cost);
                console.log(sellpriceval);
                console.log($('#sellprice_val').val());

            }


        });
    </script>

@endpush