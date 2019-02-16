@extends('layouts.layout')
@section('content')
 
<div class="col-md-12">

    <div class="portlet light bordered">
        <div class="portlet-title">
            <a class="btn btn-success" href="{{route('invoices.create')}}"><i class="fa fa-plus"></i> Create Invoice</a>
        </div>
        <div class="portlet-body">
            <table class="table table-bordered table-responsive">
                <thead>

                    <tr>
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th>Invoice Date</th>
                        <th>Total Item Price</th>
                        <th>Invoice Disc</th>
                        <th>Tax %</th>
                        <th>Net Price</th>
                        <th>Itm</th>
                        <th>Itm Color</th>
                        <th>Itm Size </th>
                        <th>Itm Offer</th>
                        <th>Itm Offer_Disc</th>
                        <th>Qty </th>
                        <th>Other Disc </th>
                        <th>Itm NetPrice </th>
                        <th colspan="2" >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesinvoices as $salesinvoice)
                        <tr>
                            <!-- <td>{{$loop->iteration}}</td> -->
                            <!-- <td>{{$salesinvoice->id}}</td> -->
                            <td><a href="{{route('invoices.show',$salesinvoice->id)}}">{{$salesinvoice->id}}</a></td>

                            <td>{{ $salesinvoice->customer->name }}</td>
                            <td>{{ $salesinvoice->Sales_date}}</td>
                            <td class="total_itminvoice" id="tr_totalitmprice_{{$salesinvoice->id}}"></td>
                            <td>{{ $salesinvoice->dis_value }}</td>
                            <td>{{ $salesinvoice->tax }}</td>
                            <td>{{ $salesinvoice->net_price }}</td>
                            <td>
                                <ui>
                                   @foreach($salesinvoice->sales_invoice_details as $salesdetail)
                                        <ol>{{$salesdetail->item->name}} </ol>
                                    @endforeach
                                </ui>
                            </td>
                            <td>
                                <ui>
                                    @foreach($salesinvoice->sales_invoice_details as $salesdetail)
                                       <ol>{{$salesdetail->item->color->color_name}} </ol>
                                    @endforeach
                                </ui>
                            </td>
                            <td>
                                <ui>
                                    @foreach($salesinvoice->sales_invoice_details as $salesdetail)
                                        <ol>{{$salesdetail->item->size->size_name}} </ol>
                                    @endforeach
                                </ui>
                            </td>
                            
                            <td>
                                <ui>
                                    @foreach($salesinvoice->sales_invoice_details as $salesdetail)
                                        @foreach($salesdetail->item->offerdetails as $od)
                                        <ol>{{optional($od->offer_header)->offername}} </ol>
                               
                                        @endforeach
                                    @endforeach
                                </ui>

                                <!-- offer name -->

                            </td>   
                            <td class='offer_discount'> 
                                <ui>
                                    @foreach($salesinvoice->sales_invoice_details as $salesdetail)
                                        @foreach($salesdetail->item->offerdetails as $od)
                                            <ol>{{optional($od)->dis_item_value}}</ol>
                                        @endforeach
                                    @endforeach
                                </ui>

                                <!-- offer discount -->
                            </td>

                            <td class="qty">{{$salesdetail->qty}} </td>
                            <td class="other_discount">{{$salesdetail->other_discount}} </td>
                            <td class="itemnet_price">{{$salesdetail->itemnetprice}} </td>
                            <td>
                                <form method="post" action="/invoices/{{$salesinvoice->id}}" >
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('invoices.edit',$salesinvoice->id)}}" Class="btn btn-info">
                                    <i Class="fa fa-lg fa-pencil"></i></a>
                                    <button onclick="return confirm('are you sure to delete this invoice')" type="submit" Class="btn btn-danger" >
                                    <i Class="fa fa-lg fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div> <!--- End portlet light bordered--->
 </div> <!--- End col-md-12--->

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
        $(document).ready(function () {
            fntotalinvoiceprice();
            function fntotalinvoiceprice(){
                var sum=0;

                $(".itemnet_price").each(function() {
                    totalitprice = $(this).text();
                    if(!isNaN(totalitprice) && totalitprice.length != 0) {
                    sum += parseFloat(totalitprice);
                    console.log('#tr_totalitmprice_{{$salesinvoice->id}}');
                    $('#tr_totalitmprice_{{$salesinvoice->id}}').text(sum);
                   }
               });
            }
    
    });


    </script>

@endpush

