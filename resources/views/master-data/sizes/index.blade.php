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
<form class="form" method="post" action="{{route('sizes.store')}}">
    <div class="col-md-12">
        <div class="portlet light">
            <!-- <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Sizes</span>
                </div>
            </div> -->

            <div class="portlet-body form">
                @csrf


                <div class="row">
                    <div class="input-group col-md-12 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Size </div>

                                <!-- ---------- Create New Size Name ----------- -->

                                <div class="panel-body">
                                    <label class="col-md-2">Size Name </label>
                                    <input class="form-control col-md-2" type="text" name="size_name" id="size_name" >
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Save </button>
                                    <a href="{{route('sizes.index')}}" class="btn default">Cancel</a>
                                </div>


                             <!-- --------- End Create New Size Name --------- -->



                        <!-- ---------- Show Sizes Name ----------- -->
                            <div class="portlet-body">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th> Size Name </th>
                                            <th> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sizes as $size)
                                        <tr>
                                            <td class="count id" data-id="{{$size->id}}" data-name="{{$size->size_name}}">{{$loop->iteration}}

                                            </td>

                                             <!-- {{-- <td class="count size_name" data-id="{{$size->id}}" data-name="{{$size->size_name}}" id='{{$size->size_name}}_+{{$size->id}}+'>{{$size->size_name}}</td> --}} -->
                                             <td class="size_name" id='tr_size_name_{{$size->id}}'>{{$size->size_name}}</td>



                                            <td >
                                                    <!-- -- ------------ Edit size -------------- -- -->

                                                        <a href="#" class="btn btn-info size-edit-btn" id="edit" data-toggle="modal" data-target="#myModal" >
                                                            <i Class="fa fa-lg fa-pencil"></i></a>
                                                    <!-- ----------------- End edit Size -------------- -->

                                                    <!-- ------------ Delete Size -------------- -->
                                                        <a href="#" class="btn btn-danger size-delete-btn">
                                                            <i Class="fa fa-lg fa-trash"></i></a>

                                                          <!-- ----------------- End Delete Size -------------- -->


                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="text-center">
                                        {{$sizes->links()}}

                                </div>

                            </div>
                        <!-- --------- End Show Sizes Name -------- -->




                <!-- -------------  Edit Size Model ------------ -->
                            <div class="modal fade myModal" id="myModal" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">

                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Size</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Size Name:</label>
                                            <input type="text" name="size_name1" class="form-control ed_size_name" id="ed_size_name" >
                                            <input type="hidden" name="id" class="form-control size_id" id="size_id" >
                                            <div>
                                                <button type="button" class="btn blue edit_size" data-dismiss="modal">Edit</button>
                                                <button type="button" class="btn red close_modal" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                      <!-- -------------End Edit Size Model ------------ -->


                        </div>
                    </div>
                </div>






            </div>
                <!-- --------- End Create New Size Name --------- -->

            </div> <!-- ------ End portlet-body form -->






        </div> <!-- end portlet light --->

</form> <!-- end form action --->






@endsection
@push('script')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
 crossorigin="anonymous">
</script>
<script src="https://unpkg.com/popper.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

     <script>
$(document).ready(function(){

    $("body").on('click' , '.size-edit-btn', function(){
            $("#myModal").modal('show');
            var id = $(this).closest('tr').find('.count').data('id');
            //   $('.size-edit-model').attr('action' , "/sizes/"+id);
            var size_name = $(this).closest('tr').find('.count').data('name');
            $(".ed_size_name").val(size_name);
            $(".size_id").val(id);
        });


        $("body").on('click' , '.edit_size', function(e){
           var id = $('.size_id').val();
            var size_name = $('.ed_size_name').val();
          //  console.log(size_name);
            // var id = $(this).closest('tr').find('.count').data('id');
            console.log(this);
            var tr = $(this).closest('tr');


            //console.log(value);

            $.ajax({
                url: '/sizes-update/',
                mehtod:"get",
                data: {
                id : id ,
                size_name : size_name
                },
                success:function(data)

                {
                    //console.log(tr);
                console.log( $('#tr_size_name_'+id).html(data.size_name));
                $('#tr_size_name_'+id).html(data.size_name);
                //

                //    $('#size_name_'+id).html(data.size_name);
//$('.size_name',tr).html(data.size_name);
                // console.log(data.id);
                // tr.find('.size_name').attr( 'id' ,"size_"+data.id);
                // $('#size_'+data.id).text(data.size_name);



                //     console.log(data.id);

                //     console.log(data.size_name);
                //     console.log($('#size_name_'+id));
                //     console.log( $('#size_name'+id).html(data.size_name));
                }

            });
});



    $(document).on('click', '.size-delete-btn', function(){
        if(confirm("Are you sure you want to Delete this data?"))
        {
            var id = $(this).closest('tr').find('.count').data('id');
            var tr = $(this).closest('tr');
            $.ajax({
                url: '/size-delete/',
                method:"get",
                data: { id : id , _token : "{{ csrf_token() }}"},
                success:function(data)
                {

                   tr.remove();


                }
            })
        }
        else
        {
            return false;
        }
    });



});



</script>
@endpush
