@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Item </span>
                    </div>
                </div> <!-- End portlet-title -->
          

                <div class="portlet-body form">
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Item Name"   value="{{$item->name}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->


                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Item Name"   value="{{$item->name}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Category Name:</label>
                            <div class="input-group col-md-6">
                                @foreach ($categories as $category)
                                    @if( $item->category_id == $category->id )
                                        <input class="form-control" name="category_id" id="category_id" value="{{$category->name}}" disabled>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                   </div>
                 
                   <div class="row">
                        <div class="form-group {{$errors->has('size_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Size :</label>
                            <div class="input-group col-md-6">
                                @foreach ($sizes as $size)
                                    @if( $item->size_id == $size->id )
                                        <input class="form-control" name="size_id" id="size_id" value="{{$size->size_name}}" disabled>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                   </div>

                   <div class="row">
                        <div class="form-group {{$errors->has('color_id') ? 'has-error' : ''}}">
                            <label class="col-md-2">Color :</label>
                            <div class="input-group col-md-6">
                                @foreach ($colors as $color)
                                    @if( $item->color_id == $color->id )
                                        <input class="form-control" name="color_id" id="color_id" value="{{$color->color_name}}" disabled>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                   </div>

                   <div class="row">
                        <div class="form-group {{$errors->has('qty') ? 'has-error' : ''}}">
                            <label class="col-md-2">Qty: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="qty" placeholder="Qty"   value="{{$item->qty}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->


                    <div class="row">
                        <div class="form-group {{$errors->has('barcode') ? 'has-error' : ''}}">
                            <label class="col-md-2">Barcode: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="barcode" placeholder="Enter Barcode"   value="{{$item->barcode}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('serial') ? 'has-error' : ''}}">
                            <label class="col-md-2">serial: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="serial" placeholder="Enter Serial"   value="{{$item->serial}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                            <label class="col-md-2">Item Price: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="price" placeholder="Enter Item Price"   value="{{$item->price}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('other_costs') ? 'has-error' : ''}}">
                            <label class="col-md-2">Other Costs: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="other_costs" placeholder="Enter other costs"   value="{{$item->other_costs}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('profit_percent') ? 'has-error' : ''}}">
                            <label class="col-md-2">Profit Percent: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="profit_percent" placeholder="Enter Profit Percent"   value="{{$item->other_costs}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->

                    <div class="row">
                        <div class="form-group {{$errors->has('sell_price') ? 'has-error' : ''}}">
                            <label class="col-md-2">Sell Price: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="sell_price" placeholder="Enter Sell Price"   value="{{$item->sell_price}}" disabled>
                            </div>
                        </div>
                    </div> <!-- End row -->





                    <div class="form-actions">
                        <a href="{{route('items.index')}}" class="btn blue">Back</a>
                    </div>

                </div> <!-- End portlet-body form -->

            </div> <!-- End portlet light -->
        </div> <!-- End col-md-12 -->
@endsection

