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
                        <span class="caption-subject bold uppercase">Invoice </span>
                    </div>
                </div> <!-- End portlet-title -->

                <div class="portlet-body form">

                    <div class="input-group col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Invoices</div>
                                    <div class="panel-body">
                        
                                        <div class="row">
                                                <label class="col-md-2">Customer Name: </label>
                                                <div class="input-group col-md-6">
                                                    <input type="text" class="form-control" placeholder="Customer Name"   value="{{$salesinvoice->customer->name}}" disabled>
                                                </div>
                                        </div> <!-- End row -->
                                        <br/>

                                        <div class="row">
                                                <label class="col-md-2">Total Item Price: </label>
                                                <div class="input-group col-md-6">
                                                    <input type="number" class="form-control total_itminvoice" id="total_itminvoice" placeholder="Total Item Price"  disabled>

                                                </div>
                                        </div> <!-- End row -->
                                        <br/>



                                        <div class="row">
                                                <label class="col-md-2">Tax: </label>
                                                <div class="input-group col-md-6">
                                                    <input type="number" class="form-control" placeholder="Tax"   value="{{$salesinvoice->tax}}" disabled>
                                                </div>
                                        </div> <!-- End row -->
                                        <br/>

                                        <div class="row">
                                                <label class="col-md-2">Invoice Discount: </label>
                                                <div class="input-group col-md-6">
                                                    <input type="number" class="form-control" placeholder="Invoice Discount"   value="{{$salesinvoice->dis_value}}" disabled>
                                                </div>
                                        </div> <!-- End row -->
                                        <br/>
                                        
                                        <div class="row">
                                                <label class="col-md-2">Total Invoice : </label>
                                                <div class="input-group col-md-6">
                                                    <input type="number" class="form-control" placeholder="Total Invoice"   value="{{$salesinvoice->net_price}}" disabled>
                                                </div>
                                        </div> <!-- End row -->
                                        <br/>

                                        <div class="row">
                                                <label class="col-md-2">Invoice Date: </label>
                                                <div class="input-group col-md-6">
                                                    <input type="date" class="form-control" placeholder="Invoice Date"   value="{{$salesinvoice->Sales_date}}" disabled>
                                                </div>
                                        </div> <!-- End row -->
                                        <br/>

                                        <div class="portlet-body">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Sell Price</th>
                                                    <th>Offer</th>
                                                    <th>Offer Discount</th>
                                                    <th>Qty</th>
                                                    <th>Other Discount</th>
                                                    <th>Item After Discount</th>
                                                    <th>Item Net price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @foreach($salesinvoice->sales_invoice_details as $detail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$detail->item->name}} </td>
                                                        <td>{{$detail->item->color->color_name}} </td>
                                                        <td>{{$detail->item->size->size_name}} </td>
                                                        <td class='sell_price price' id="tr_sellprice_{{$detail->item->sell_price}}">{{$detail->item->sell_price}} </td>
                                                        <td>
                                                            @foreach($detail->item->offerdetails as $od)
                                                                <ol>{{optional($od)->offer_header->offername}}</ol>
                                                             @endforeach
                                                        </td>
                                                        <td class='offer_discount price'>
                                                            @foreach($detail->item->offerdetails as $od)
                                                                <ol>{{optional($od)->dis_item_value}}</ol>
                                                             @endforeach   
                                                        </td>     
                                                        <td class="qty">{{$detail->qty}} </td>
                                                        <td class="other_discount">{{$detail->other_discount}} </td>
                                                        <td class="itemafterdiscount"> Item after Discount </td>
                                                        <td class="itemnetprice itemnet_price">{{$detail->itemnetprice}} </td>
                                                        
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>


                                    </div><!-- End panel-body --> 
                            </div><!-- End panel panel-primary --> 
                    </div><!-- End input-group col-md-12 -->   

                    <div class="form-actions">
                        <a href="{{route('invoices.index')}}" class="btn blue">Back</a>
                    </div>

                </div> <!-- End portlet-body form -->

            </div> <!-- End portlet light -->
        </div> <!-- End col-md-12 -->     

@endsection

@push('script')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('admin/scripts/moment.min.js') }}"></script>
    <script src="{{ asset('admin/scripts/bootstrap-datetimepicker.min') }}"></script>

    <script>
        $(document).ready(function(){
            fntotaltmprice();
            fn_total_itm_afterdiscount();
            //console.log(fntotaltmprice());

                function fntotaltmprice(){
                    var sum=0;
                    $(".itemnetprice").each(function() {
                        total_itmprice = $(this).text();
                        if(!isNaN(total_itmprice) && total_itmprice.length != 0) {
                            sum += parseFloat(total_itmprice);
                        }
                      });
                    $('#total_itminvoice').val(sum);
                    //console.log(sum);
                }

                function fn_total_itm_afterdiscount(){
                    var itmsell_price = 0;
                    var itmoffer_discount = 0;
                    var itmafterdis = 0;
                                      
                    $(".price").each(function() {
                        var elm = $(this);
                        itmsell_price = $(this).closest('tr').find('.sell_price').text();
                        itmoffer_discount = $(this).closest('tr').find('.offer_discount').text();
                        if(!isNaN(itmoffer_discount) && itmoffer_discount.length != 0) {
                            itmafterdis = parseFloat(itmsell_price - (itmsell_price*itmoffer_discount/100));
                            console.log(itmafterdis);
                            elm.closest('tr').find('.itemafterdiscount').val(itmafterdis);
                            }
                      });
                }

        });
    </script>

@endpush

