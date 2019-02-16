@extends('layouts.layout')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="form" method="post" action="{{route('invoices.store')}}" >
    
            <div class="portlet-body form">
                @csrf

                    <div class="input-group col-md-12">
                        <div class="panel panel-primary">
                                <div class="panel-heading">Create Invoice</div>
                                <div class="panel-body">


                                    <div class="row ">
                                        <label class="col-md-2">Customer name:</label>
                                        <div class="input-group col-md-6">
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                <option value="">--Select Customer--</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    
                                    <br />

                                    <div class="row ">
                                        <label class="col-md-2">Invoice Date:</label>
                                        <div class="input-group col-md-6">
                                            <input type="date" name="Sales_date" class='form-control datepicker' value="{{date('Y-m-d H:i:s')}}" placeholder="Select Invoice Date" required >
                                        </div>
                                    </div> <!-- End Row --->
                                    
                                    <br />

                                   
                                    <div class="row">
                                        <label class="col-md-2">Total Item Price:</label>
                                        <div class="input-group col-md-6">
                                            <input type="number"  class='form-control item_total_price' placeholder="Total Item Price" step="any" >
                                        </div>
                                    </div> <!-- End Row --->


                                    <br />
                                    <div class="row">
                                        <label class="col-md-2">Invoice Discount:</label>
                                        <div class="input-group col-md-6">
                                            <input type="number" name="dis_value" class='form-control invoice_discount price' value = "0" placeholder="Enter Discount Value" step="any" >
                                        </div>
                                    </div> <!-- End Row --->

                                    <br />

                                    <div class="row">
                                        <label class="col-md-2">Tax %:</label>
                                        <div class="input-group col-md-6">
                                            <input type="number" name="tax" class="form-control price tax" value="0"   placeholder="tax %" step="any">

                                        </div>
                                    </div>
                                    
                                    <br />



                                    <div class="row">
                                        <label class="col-md-2">Net Price:</label>
                                        <div class="input-group col-md-6">
                                            <input type="number" name="net_price" class='form-control net_price' value="0" placeholder="Net Price" step="any" disabled >
                                        </div>
                                    </div> <!-- End Row --->



                                    <br />

                                     <!-- --------- Details Invoice ----------- -->
                                    <div class="row">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th>Item</th>
                                                    <th>Sell Price</th>
                                                    <th> Size</th>
                                                    <th> Color</th>
                                                    <th> Offer </th>
                                                    <th> Offer Discount</th>
                                                    <th>Qty</th>
                                                    <th>Other Discount</th>
                                                    <th>Item After Discount</th>
                                                    <th>Item Net Price</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="item_body">
                                                <tr id="clone" hidden>
                                                        <td></td>
                                                        <td class="counter" width="2%"></td>

                                                        <td width="10%">
                                                            <Select class="form-control category_id" data-live-search="true" >
                                                                <option value=""> -- Select Category -- </option>
                                                                @forelse ($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @empty
                                                                    <option Selected>No Category Found</option>
                                                                @endforelse
                                                            </Select>
                                                        </td>
                                                        <td width="10%">
                                                            <Select class="form-control item_id" data-live-search="true" >
                                                                <option value=""> -- Select Item -- </option>
                                                                @forelse ($items as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @empty
                                                                    <option Selected>No Item Found</option>
                                                                @endforelse
                                                            </Select>
                                                        </td>

                                                        <td width="8%">
                                                            <input type="number" class="form-control sell_price price" value="0" placeholder="Sell Price" Step="any">
                                                        </td>

                                                        <td width="8%">
                                                            <input type="hidden" class="form-control size_id">
                                                            <input type="text" class="form-control size" placeholder="Size" readonly>
                                                        </td>

                                                        <td width="8%">
                                                            <input type="hidden" class="form-control color_id">
                                                            <input type="text" class="form-control color" placeholder="Color" readonly>
                                                        </td>

                                                        <td width="10%">
                                                            <Select class="form-control offer_id" data-live-search="true" >
                                                                <option value=""> -- Select Offer -- </option>
                                                                <!-- @forelse ($offerheader as $oh)
                                                                    <option value="{{$oh->id}}">{{$oh->offername}}</option>
                                                                @empty
                                                                    <option Selected>No Offer Found</option>
                                                                @endforelse -->
                                                            </Select>
                                                        </td>

                                                        <td width="8%">
                                                            <input type="number" class="form-control offer_discount" value="0" step="any" readonly>
                                                        </td>

                                                        <td width="8%">
                                                            <input type="number" class="form-control qty price" value="1" step="any">
                                                        </td>

                                                        <td width="8%">
                                                            <input type="number" class="form-control other_discount price" value="0" step="any">
                                                        </td>
                                                    
                                                        
                                                        <td width="8%">
                                                            <input type="number" class="form-control itemafterdiscount" value="0" step="any" readonly>
                                                        </td>

                                                        <td width="8%">
                                                            <input type="number" class="form-control itemnetprice" value="0" step="any" readonly>
                                                        </td>

                                                        <td width="3%">
                                                            <button class="btn btn-success add"><i class="fa fa-plus"></i></button>
                                                        </td>
                                                        <td width="3%">
                                                            <button class="btn btn-danger remove"><i  class="fa fa-times"></i></button>
                                                        </td>
                                                </tr>



                                                <tr id="clone1">
                                                    <td></td>
                                                    <td width="2%">1</td>
                                                    <td width="10%">
                                                        <Select name="item_invoice[1][category_id]" class="form-control selectpicker category_id" data-live-search="true" required>
                                                            <option value=""> Select Category </option>
                                                            @forelse($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @empty
                                                                <option Selected>No Category Found</option>
                                                            @endforelse
                                                        </Select>
                                                    </td>

                                                    <td width="10%">
                                                        <Select name="item_invoice[1][item_id]" class="form-control selectpicker item_id" data-live-search="true" required>
                                                            <option value=""> Select Item </option>
                                                            @forelse ($items as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @empty
                                                                <option Selected>No Item Found</option>
                                                            @endforelse
                                                        </Select>
                                                    </td>
                                                
                                                    <td width="8%">
                                                        <input type="number" class="form-control sell_price price"  name="item_invoice[1][sell_price]"  placeholder=" Sell Price " step="any" value="0" >
                                                    </td>

                                                    <td width="8%">
                                                        <input type="hidden" class="form-control size_id" name="item_invoice[1][size_id]">
                                                        <input type="text" class="form-control size"  name="item_invoice[1][size]"  placeholder=" Size " readonly >
                                                    </td>

                                                    <td width="8%">
                                                        <input type="hidden" class="form-control color_id" name="item_invoice[1][color_id]">
                                                        <input type="text" class="form-control color"  name="item_invoice[1][color]"  placeholder="Color " readonly >
                                                    </td>

                                                    <td width="10%">
                                                        <Select name="item_invoice[1][offer_id]" class="form-control selectpicker offer_id" data-live-search="true" >
                                                            <option value=""> --- Select Offer --- </option>
                                                                <!-- @forelse ($offerheader as $oh)
                                                                    <option value="{{$oh->id}}">{{$oh->offername}}</option>
                                                                @empty
                                                                    <option Selected>No Offer Found</option>
                                                                @endforelse -->

                                                        </Select>
                                                    </td>

                                                    <td width="8%">
                                                        <input type="number" class="form-control offer_discount " step="any" name="item_invoice[1][offer_discount]"  placeholder="Offer Discount " readonly>
                                                    </td>


                                                    <td width="8%">
                                                        <input type="number" class="form-control qty price" value="1" step="any" name="item_invoice[1][qty]"  placeholder="Enter Quantity " >
                                                    </td>


                                                    <td width="8%">
                                                        <input type="number" class="form-control other_discount price" value="0" step="any" name="item_invoice[1][other_discount]"  placeholder="Other Discount Value" >
                                                    </td>

                                                
                                                    <td width="8%">
                                                        <input type="number" class="form-control itemafterdiscount " step="any" name="item_invoice[1][itemafterdiscount]" value="0" placeholder="Item After Discount " readonly>
                                                    </td>

                                                    <td width="8%">
                                                        <input type="number" class="form-control itemnetprice " step="any" name="item_invoice[1][itemnetprice]" value="0" placeholder="Item Net Price " readonly>
                                                    </td>


                                                    

                                                    <td width="3%">
                                                        <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button></td>
                                                    <td width="3%"> </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                     <!-- ---------End Details Invoice ----------- -->


                                </div> <!-- End panel-body -->
                        </div> <!-- End panel-primary -->
                    </div>  <!-- End input-group col-md-6 col-md-offset-3 -->



            </div> <!--- End body form -->


            <div class="form-actions">
                <button type="submit" class="btn blue">Save</button>
                <a href="{{route('invoices.index')}}" class="btn default">Cancel</a>
            </div>



   
</form>


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

            var table_body = $('#item_body');
            var count = 1 ;



            table_body.on('click' , '.add' , function(e)
            {
                e.preventDefault();
                ++count;
                var tr_clone = $('#clone').clone();
                tr_clone.prop('hidden' , '');
                tr_clone.find('#clone').attr('id','clone'+count);
                tr_clone.find('.counter').html(count);
                tr_clone.find('.category_id').attr('name' , 'item_invoice['+count+'][category_id]');
                tr_clone.find('.item_id').attr('name' , 'item_invoice['+count+'][item_id]');
                tr_clone.find('.item_id').attr('required' , true);
                
                tr_clone.find('.sell_price').attr('name' , 'item_invoice['+count+'][sell_price]');
                tr_clone.find('.sell_price').attr('required' , true);

                

                tr_clone.find('.size').attr('name' , 'item_invoice['+count+'][size]');
                tr_clone.find('.size_id').attr('name' , 'item_invoice['+count+'][size_id]');

                tr_clone.find('.color').attr('name' , 'item_invoice['+count+'][color]');
                tr_clone.find('.color_id').attr('name' , 'item_invoice['+count+'][color_id]');

                tr_clone.find('.other_discount').attr('name' , 'item_invoice['+count+'][other_discount]');
                
                tr_clone.find('.itemafterdiscount').attr('name' , 'item_invoice['+count+'][itemafterdiscount]');

                tr_clone.find('.itemnetprice').attr('name' , 'item_invoice['+count+'][itemnetprice]');
                tr_clone.find('.itemnetprice').attr('required' , true);


                tr_clone.find('.offer_id').attr('name' , 'item_invoice['+count+'][offer_id]');
                tr_clone.find('.offer_discount').attr('name' , 'item_invoice['+count+'][offer_discount]');

                tr_clone.find('.qty').attr('name' , 'item_invoice['+count+'][qty]');
                tr_clone.find('.qty').attr('required' , true);

                table_body.append(tr_clone);
            });

            table_body.on('click' , '.remove' , function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            });

            //console.log(fnitemnetprice());
            // ----------------jquery  change category ------

            table_body.on('change' , '.category_id' ,function(e){
                e.preventDefault();
                var elm = $(this);
                var catid= $(this).val();
                if(catid){
                    $.get('/itemycat/get/'+catid).done(function(data){
                        elm.closest('tr').find('.item_id').empty();
                        elm.closest('tr').find('.item_id').append('<option value ="" > Select Item </option>');

                        $.each(data,function(index,item){
                            var option="<option value= '"+item.id+"'>" + item.name + "</option>";
                            elm.closest('tr').find('.item_id').append(option);
                          
                        });
                    });
                }

            });


            //-------- Ajax to get Item values -------------
            table_body.on('change' , '.item_id' ,function(e){
                e.preventDefault();
                var elmitem = $(this);
                var itemid= $(this).val();
                if(itemid){
                    $.get('/itemvalues/get/'+itemid).done(function(data){
                       
                        $.each(data,function(index,item){
                            elmitem.closest('tr').find('.sell_price').empty();
                            elmitem.closest('tr').find('.offer_discount').empty();
                            elmitem.closest('tr').find('.sell_price').val(data.sell_price);
                           
                            elmitem.closest('tr').find('.size_id').empty();
                            elmitem.closest('tr').find('.size_id').val(data.size_id);

                            elmitem.closest('tr').find('.color_id').empty();
                            elmitem.closest('tr').find('.color_id').val(data.color_id);

                            // ------- to get prices ----------

                            var item_sellprice = 0;
                            var itm_offerdisc = 0;
                            var itm_qty = 0;
                            var itm_otherdisc = 0;
                            var itm_afterdisc= 0;
                            var itm_netprice = 0;
                            var itm_totalprice = 0;
                            var sum = 0;
                            var vrtax = 0;
                            var vrinvoice_discount = 0;
                            var invoicenetprice = 0;

                            itm_otherdisc =Number(elmitem.closest('tr').find('.other_discount').val());
                            itm_qty =Number(elmitem.closest('tr').find('.qty').val());

                            item_sellprice = Number(elmitem.closest('tr').find('.sell_price').val());
                            
                            itm_offerdisc =Number(elmitem.closest('tr').find('.offer_discount').val());
                            itm_afterdisc =item_sellprice-(item_sellprice*itm_offerdisc/100);
                            elmitem.closest('tr').find('.itemafterdiscount').val(itm_afterdisc);
                            itm_netprice =itm_afterdisc*itm_qty-itm_otherdisc;
                            elmitem.closest('tr').find('.itemnetprice').val(itm_netprice);

                            vrinvoice_discount =  $('.invoice_discount').val();
                            vrtax =  $('.tax').val();

                            $('.itemnetprice').each(function() {
                                sum += Number($(this).val());
                            });

                            $('.item_total_price').val(sum);

                            invoicenetprice =  sum-(sum*vrtax/100)-vrinvoice_discount;
                            $('.net_price').val(invoicenetprice);

                            $('.price').keyup(function(){

                                    var elmprice = $(this);
                                    var elmqtyval =Number(elmprice.closest('tr').find('.qty').val());
                                    var elmoffer_discount =Number(elmprice.closest('tr').find('.other_discount').val());
                                    var item_sellprice = Number(elmprice.closest('tr').find('.sell_price').val());
                                    var itm_offerdisc =Number(elmprice.closest('tr').find('.offer_discount').val());
                                    var itm_afterdisc =item_sellprice-(item_sellprice*itm_offerdisc/100);
                                    elmprice.closest('tr').find('.itemafterdiscount').val(itm_afterdisc);
                                    var itm_netprice =itm_afterdisc*elmqtyval-elmoffer_discount;
                                    elmprice.closest('tr').find('.itemnetprice').val(itm_netprice);
                                    
                                    var sum = 0;
                                            var vrtax = 0;
                                            var vrinvoice_discount = 0;
                                            var invoicenetprice = 0;

                                            vrinvoice_discount =  $('.invoice_discount').val();
                                            vrtax =  $('.tax').val();

                                            $('.itemnetprice').each(function() {
                                                sum += Number($(this).val());
                                            });

                                            $('.item_total_price').val(sum);

                                            invoicenetprice =  sum-(sum*vrtax/100)-vrinvoice_discount;
                                            $('.net_price').val(invoicenetprice);
                                  });

                            // --------- End prices -----------
                          
                    });

                    var itemcolorid= elmitem.closest('tr').find('.color_id').val();
                    var itemsizeid= elmitem.closest('tr').find('.size_id').val();
                    $.get('/sizes/get/'+itemsizeid).done(function(data){
                        elmitem.closest('tr').find('.size').empty();
                        elmitem.closest('tr').find('.size').val(data.size_name);

                    });

                    $.get('/colors/get/'+itemsizeid).done(function(data){
                        elmitem.closest('tr').find('.color').empty();
                        elmitem.closest('tr').find('.color').val(data.color_name);

                    });
  
            });
                // ------------- End get Ajax to get Item values  ------

                //-------- Ajax to get Item Offer -------------

                $.get('/offers/get/'+itemid).done(function(data){
                    elmitem.closest('tr').find('.offer_id').empty();
                    elmitem.closest('tr').find('.offer_discount').empty();

                    elmitem.closest('tr').find('.offer_id').append('<option value ="" > Select Offer </option>');
                    $.each(data,function(index,offer){
                        var option="<option value= '"+offer.id+"'>" + offer.name + '  ' + offer.start_date + ' ' + offer.expire_date + "</option>";
                        elmitem.closest('tr').find('.offer_id').append(option);
                                     
                    
                    });
                        //-------- End Ajax to get Item Offer -------------
                  });
                }

                //---- Ajax to get offer discount --------
                table_body.on('change' , ".offer_id" , function(e){
                // $(".offer_id").on('change',function(e){
                    e.preventDefault();
                    var elmoffer = $(this);
                    var elmofferitem =$(this).closest('tr').find('.item_id');
                    var itemval =$(this).closest('tr').find('.item_id').val();
                    var elmoffer_discount =$(this).closest('tr').find('.offer_discount');

                    var offerId=$(this).val();
                    
                    if(offerId && itemval) {
                        $.get('/offerdiscount/get/'+offerId+'/'+itemval).done(function(data){
                           $.each(data,function(index,offerd){
                                elmoffer.closest('tr').find('.offer_discount').empty();
                                elmoffer.closest('tr').find('.offer_discount').val(data[0]);
                              
                                var item_sellprice = 0;
                                var itm_offerdisc = 0;
                                var itm_qty = 0;
                                var itm_otherdisc = 0;
                                var itm_afterdisc= 0;
                                var itm_netprice = 0;
                                var itm_totalprice = 0;
                                var sum = 0;
                                var vrtax = 0;
                                var vrinvoice_discount = 0;
                                var invoicenetprice = 0;

                                itm_otherdisc =Number(elmoffer.closest('tr').find('.other_discount').val());
                                itm_qty =Number(elmoffer.closest('tr').find('.qty').val());

                                item_sellprice = Number(elmoffer.closest('tr').find('.sell_price').val());
                                itm_offerdisc =Number(elmoffer.closest('tr').find('.offer_discount').val());
                                itm_afterdisc =item_sellprice-(item_sellprice*itm_offerdisc/100);
                                elmoffer.closest('tr').find('.itemafterdiscount').val(itm_afterdisc);
                                itm_netprice =itm_afterdisc*itm_qty-itm_otherdisc;
                                elmoffer.closest('tr').find('.itemnetprice').val(itm_netprice);

                                vrinvoice_discount =  $('.invoice_discount').val();
                                vrtax =  $('.tax').val();

                                $('.itemnetprice').each(function() {
                                    sum += Number($(this).val());
                                });

                                $('.item_total_price').val(sum);

                                invoicenetprice =  sum-(sum*vrtax/100)-vrinvoice_discount;
                                $('.net_price').val(invoicenetprice)

                            
                                $('.price').keyup(function(){

                                    var elmprice = $(this);
                                    var elmqtyval =Number(elmprice.closest('tr').find('.qty').val());
                                    var elmoffer_discount =Number(elmprice.closest('tr').find('.offer_discount').val());
                                    var item_sellprice = Number(elmprice.closest('tr').find('.sell_price').val());
                                    var itm_otherdisc =Number(elmprice.closest('tr').find('.other_discount').val());
                                    var itm_afterdisc =item_sellprice-(item_sellprice*elmoffer_discount/100);
                                    elmprice.closest('tr').find('.itemafterdiscount').val(itm_afterdisc);
                                    var itm_netprice =itm_afterdisc*elmqtyval-itm_otherdisc;
                                    elmprice.closest('tr').find('.itemnetprice').val(itm_netprice);

                                    var sum = 0;
                                            var vrtax = 0;
                                            var vrinvoice_discount = 0;
                                            var invoicenetprice = 0;

                                            vrinvoice_discount =  $('.invoice_discount').val();
                                            vrtax =  $('.tax').val();

                                            $('.itemnetprice').each(function() {
                                                sum += Number($(this).val());
                                            });

                                            $('.item_total_price').val(sum);

                                            invoicenetprice =  sum-(sum*vrtax/100)-vrinvoice_discount;
                                            $('.net_price').val(invoicenetprice);

                                });


                                $('.tax').keyup(function ()
                                        {
                                            var sum = 0;
                                            var vrtax = 0;
                                            var vrinvoice_discount = 0;
                                            var invoicenetprice = 0;

                                            vrinvoice_discount =  $('.invoice_discount').val();
                                            vrtax =  $('.tax').val();

                                            $('.itemnetprice').each(function() {
                                                sum += Number($(this).val());
                                            });

                                            $('.item_total_price').val(sum);

                                            invoicenetprice =  sum-(sum*vrtax/100)-vrinvoice_discount;
                                            $('.net_price').val(invoicenetprice);

                                        });

                         });
                    });
                                
                }


            });
            //---------- End ajax to get offer discount ----------
    
       });

            //-------- End Ajax to get Item values -------------



            $('.datepicker').datetimepicker({
            format : 'YYYY-MM-DD',
        });


    });
    </script>

@endpush
