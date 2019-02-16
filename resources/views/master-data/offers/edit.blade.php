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

    <form class="form" method="post" action="{{route('offers.update' , ['id'=>$offerheader->id])}}" >
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Edit Offer</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="input-group col-md-6 col-md-offset-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Offers</div>
                                <div class="panel-body">
                                    <label class="col-md-2">Name: </label>
                                    <div class="input-group col-md-6">
                                        <input type="text" class="form-control" name="offername" placeholder = "Enter Offer Name" value="{{$offerheader->offername}}" required>
                                    </div>
                                    <br />
                                    <label class="col-md-2">Offer Start Date: </label>
                                    <div class="input-group col-md-6">
                                        <input type="date" class="form-control" name="start_date" placeholder = "Offer Start Date" value="{{$offerheader->start_date}}" required>
                                    </div>
                                    <br />
                                    <label class="col-md-2">Offer End Date: </label>
                                    <div class="input-group col-md-6">
                                        <input type="date" class="form-control" name="expire_date" placeholder = "Offer End Date" value="{{$offerheader->expire_date}}" required>
                                    </div>
                                </div> <!-- -End div panel body ---->
                            </div> <!-- -End div panel-primary ---->
                        </div> <!-- -End div input-group ---->
                    </div>  <!------ End Row --- -->


                        <br />
                    <div class="row">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Category</td>
                                    <td>Item</td>
                                    <td>Item Discount</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                                <tr>
                                    <tbody id="offer_body">
                                        <tr id="clone" hidden>
                                            <td class="counter" width="3%"></td>
                                            <td width="25%">
                                                <Select class="form-control category_id" data-live-search="true" >
                                                    @forelse ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @empty
                                                        <option Selected>No Category Found</option>
                                                    @endforelse
                                                </Select>
                                            </td>
                                            <td width="25%">
                                                <Select class="form-control item_id" data-live-search="true" >
                                                    @forelse ($items as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @empty
                                                        <option Selected>No Item Found</option>
                                                    @endforelse
                                                </Select>
                                            </td>

                                            <td width="15%">
                                                <input type="number" class="form-control dis_item_value" step="any">
                                            </td>

                                            <td width="3%">
                                                <button class="btn btn-success add"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td width="3%">
                                                <button class="btn btn-danger remove"><i  class="fa fa-times"></i></button>
                                            </td>
                                        </tr>  
                                       
                                        @php
                                        $count = $offerheader->offerdetails->count();
                                        @endphp
                                        @if($offerheader->offerdetails->count()== 0)

                                        <tr id="clone0">
                                            <td class="counter" width="3%"></td>
                                            <td width="25%">
                                                <Select name="category_item[0][category_id]" class="form-control selectpicker category_id" data-live-search="true" required>
                                                    <option value=""></option>
                                                    @forelse($categories as $category)
                                                        <option value="{{$course->id}}">{{$category->name}}</option>
                                                    @empty
                                                        <option Selected>No Category Found</option>
                                                    @endforelse
                                                </Select>
                                            </td>

                                            <td width="25%">
                                                <Select name="category_item[0][item_id]" class="form-control selectpicker item_id" data-live-search="true" required>
                                                    <option value=""></option>
                                                    @forelse($items as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @empty
                                                        <option Selected>No Item Found</option>
                                                    @endforelse
                                                </Select>
                                            </td>

                                            <td width="15%">
                                                <input type="number" name="category_item[0][dis_item_value]" class="form-control dis_item_value" step="any" required>
                                            </td>

                                            <td width="3%">
                                                <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button>
                                            </td>

                                            <td width="3%">
                                                <button class="btn btn-danger remove"><i  class="fa fa-times"></i></button>
                                            </td>
                                        </tr>

                                        @else
                                        @foreach($offerheader->offerdetails as $detail)
                                            <tr id="clone{{$loop->iteration}}"> 
                                                <td width="3%">{{$loop->iteration}}</td>
                                                <td width="25%">
                                                    <Select name="category_item[{{$loop->iteration}}][category_id]" class="form-control selectpicker category_id" data-live-search="true">
                                                        @forelse($categories as $category)
                                                            
                                                            <!-- <option value="{{$category->id}}">{{$category->name}}</option> -->
                                                            <option value="{{$category->id}}" {{($category->id == $detail->item->category_id) ? 'Selected' : ''}}>{{$category->name}}</option>


                                                        @empty
                                                            <option Selected>No Category Found</option>
                                                        @endforelse
                                                    </Select>
                                                </td>

                                                <td width="25%">
                                                    <Select name="category_item[{{$loop->iteration}}][item_id]" class="form-control selectpicker item_id"  data-live-search="true">
                                                        @forelse($items as $item)
                                                            <option value="{{$item->id}}" {{($item->id == $detail->item_id) ? 'Selected' : ''}}>{{$item->name}}</option>
                                                            @empty
                                                            <option Selected>No Category Found</option>
                                                        @endforelse

                                                    </Select>
                                                </td>

                                                <td width="15%">
                                                    <input type="number" name="category_item[{{$loop->iteration}}][dis_item_value]" value="{{$detail->dis_item_value}}" class="form-control dis_item_value" step="any" >
                                                </td>
                                                <td width="5%">
                                                    <button class="btn btn-success add"><i class="fa fa-plus"></i> </button>
                                                </td>
                                                <td width="5%">
                                                    <button class="btn btn-danger remove"><i  class="fa fa-times"></i></button>
                                                </td>
                                
                                            </tr>
                                        @endforeach
                                        @endif


                                   </tbody>
                                </tr>
                            
                        </table>
                    </div>  <!------ End Row --- -->



                    <div class="form-actions">
                        <button type="submit" class="btn blue">Save</button>
                        <a href="{{route('offers.index')}}" class="btn default">Cancel</a>
                    </div>

                </div> <!---- end div portlet-body form -->

            </div> <!---- end div portlet light -->

        </div> <!---- end div col-md-12 -->
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
    $(document).ready(function(){
        var table_body=$('#offer_body');
        var count = {{$count}};

        table_body.on('click','.add',function(e){
            e.preventDefault();
            ++count;
            var tr_clone = $('#clone').clone();
            tr_clone.prop('hidden' , '');
            tr_clone.find('#clone').attr('id','clone'+count);
            tr_clone.find('.counter').html(count);
            tr_clone.find('.category_id').attr('name' , 'category_item['+count+'][category_id]');

            tr_clone.find('.item_id').attr('name' , 'category_item['+count+'][item_id]');
            tr_clone.find('.item_id').attr('required' , true);

            tr_clone.find('.dis_item_value').attr('name' , 'category_item['+count+'][dis_item_value]');
            tr_clone.find('.dis_item_value').attr('required' , true);

            table_body.append(tr_clone);
            
        });

        table_body.on('click' , '.remove' , function(e){
            e.preventDefault();
            count--;
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

     });
     </script>
@endpush

