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

<form class="form" method="post" action="{{route('offers.store')}}" >
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Create Special Offer</span>
                </div>
            </div> <!--- End portlet-title --->

        <div class="portlet-body form">
            @csrf
            <div class="row">
                <div class="input-group col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" id="panel_offer_header">
                        <div class="panel-heading">Offers</div>
                            <div class="panel-body">
                                <label class="col-md-2">Offer Name:</label>
                                <div class="input-group col-md-6">
                                    <input type="text" class="form-control" name="offername" placeholder="Offer Name" required>
                                </div>
                                <br/>
                                
                                <label class="col-md-2">Start Date:</label>
                                <div class="input-group col-md-6">
                                    <input type="date" class="form-control" name="start_date" placeholder="Offer Start Date" required>
                                </div>
                                
                                <br/>
                                <label class="col-md-2">Expire Date:</label>
                                <div class="input-group col-md-6">
                                    <input type="date" class="form-control" name="expire_date" placeholder="Offer Expire Date" required>
                                </div>
                            </div><!--- End panel-body --->
                        </div><!--- End panel-heading --->
                    </div><!--- End panel-primary --->
                </div><!--- End input-group --->
            </div><!--- End row --->

        <br />

        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category for Discount </th>
                        <th>Item</th>
                        <th>Item Discount</th>
                        <th col-span="2">Actions </th>
                    </tr>
                </thead>
                <tbody id="offer_body">
                    <tr id="clone" hidden>
                        <td class="counter" width="3%"></td>

                         <td width="25%">
                            <Select  class="form-control selectpicker category_id"   data-live-search="true" >
                                <option value="">Select Catergoy for item</option>
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                    <option Selected>No Category Found</option>
                                @endforelse
                            </Select>
                        </td>

                        <td width="25%">
                            <Select class="form-control item_id"  data-live-search="true" >

                            </Select>
                        </td>

                        <td width="15%">
                            <input type="number" class="form-control dis_item_value" step="any">
                        </td>

                        <td width="3%">
                           <button class="btn btn-success add"><i class="fa fa-plus"></i></button></td>
                        <td width="3%">
                           <button class="btn btn-danger remove"><i  class="fa fa-times"></i></button>
                        </td>

                    </tr>

                    <tr id="clone1">
                        <td width="3%">1</td>
                        <td width="25%">
                            <Select name="category_item[1][category_id]" class="form-control selectpicker category_id"   data-live-search="true" >
                                <option value="">Select Catergoy for item</option>
                                    @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @empty
                                        <option Selected>No Category Found</option>
                                    @endforelse
                            </Select>
                        </td>


                        <td width="25%">
                            <Select name="category_item[1][item_id]" class="form-control selectpicker item_id"  data-live-search="true" >
                                <option value="">Select Item</option>

                            </Select>
                        </td>
                        <td width="15%">
                             <input type="number" class="form-control dis_item_value" step="any" name="category_item[1][dis_item_value]" id="dis_item_value" >
                        </td>
                        <td width="3%">
                           <button class="btn btn-success add"><i class="fa fa-plus"></i></button></td>

                        <td width="3%"></td>

                    </tr>

                </tbody>


            </table>
        </div> <!-- --- End Div Row ----->



        </div> <!--- End portlet-body form --->

        <div class="form-actions">
            <button type="submit" class="btn blue">Save</button>
            <a href="{{route('offers.index')}}" class="btn default">Cancel </a>
        </div>



        </div> <!--- End portlet light --->
    </div>  <!--- End col-md-12 --->

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
            var table_body = $('#offer_body');
            var count = 1 ;


            table_body.on('click' , '.add' , function(e)
            {
                e.preventDefault();
                ++count;
                var tr_clone = $('#clone').clone();
                tr_clone.prop('hidden' , '');
                tr_clone.find('#clone').attr('id','clone'+count);
                tr_clone.find('.counter').html(count);
                tr_clone.find('.category_id').attr('name' , 'category_item['+count+'][category_id]');
                tr_clone.find('.category_id').attr('id' , 'cat');

                tr_clone.find('.item_id').attr('name' , 'category_item['+count+'][item_id]');
                tr_clone.find('.dis_item_value').attr('name' , 'category_item['+count+'][dis_item_value]');

                table_body.append(tr_clone);
            });

            table_body.on('click' , '.remove' , function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            });


            table_body.on('change' , '.category_id' ,function(e){
                e.preventDefault();
               // alert('ff');
                var elm = $(this);
                var catid= $(this).val();
                if(catid){
                    $.get('/items/get/'+catid).done(function(data){
                        elm.closest('tr').find('.item_id').empty();
                        elm.closest('tr').find('.item_id').append('<option value ="" > Select Item </option>');

                        $.each(data,function(index,item){
                            var option="<option value= '"+item.id+"'>" + item.name + "</option>";
                            elm.closest('tr').find('.item_id').append(option);
                        });
                    });
                }

                // console.log('category_id2');
            });

            // - to get the items for category in clone ---------


        });
    </script>
@endpush


