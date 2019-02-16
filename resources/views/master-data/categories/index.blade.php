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
<form class="form" method="post" action="{{route('category.store')}}">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-body form">
                @csrf
               
            
                <div class="row">
                    <div class="input-group col-md-12 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Categories </div>

                                <!-- ---------- Create New Category Name ----------- -->

                                <div class="panel-body">
                                    <label class="col-md-2">Category Name </label>
                                    <input class="form-control col-md-2" type="text" name="name" id="name" >
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Save </button>
                                    <a href="{{route('category.index')}}" class="btn default">Cancel</a>
                                </div>
                            

                             <!-- --------- End Create New category Name --------- -->



                        <!-- ---------- Show category Name ----------- -->
                            <div class="portlet-body">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th> Category Name </th>
                                            <th> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)                        
                                        <tr>
                                            <td class="count id" data-id="{{$category->id}}" data-name="{{$category->name}}">{{$loop->iteration}}
                                            
                                            </td>

                                             <td class="name" id='name_{{$category->id}}'>{{$category->name}}</td>


                                            <td >
                                                    <!-- -- ------------ Edit category -------------- -- -->

                                                        <a href="#" class="btn btn-info category-edit-btn" id="edit" data-toggle="modal" data-target="#myModal" >
                                                            <i Class="fa fa-lg fa-pencil"></i></a>
                                                    <!-- ----------------- End edit category -------------- -->

                                                    <!-- ------------ Delete category -------------- -->
                                                        <a href="#" class="btn btn-danger category-delete-btn">
                                                            <i Class="fa fa-lg fa-trash"></i></a>

                                                          <!-- ----------------- End Delete category -------------- -->


                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="text-center">
                                        {{$categories->links()}}

                                </div>

                            </div>
                        <!-- --------- End Show category Name -------- -->



                      
                <!-- -------------  Edit category Model ------------ -->
                            <div class="modal fade myModal" id="myModal" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">

                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>Category Name:</label>
                                            <input type="text" name="name1" class="form-control ed_category_name" id="ed_category_name" >
                                            <input type="hidden" name="id" class="form-control category_id" id="category_id" >
                                            <div>
                                                <button type="button" class="btn blue edit_category" data-dismiss="modal">Edit</button>
                                                <button type="button" class="btn red close_modal" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                       
                      <!-- -------------End Edit Category Model ------------ -->


                        </div>
                    </div>
                </div>



                   

            
            </div>
                <!-- --------- End Create New category Name --------- -->

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
    
    $("body").on('click' , '.category-edit-btn', function(){
            $("#myModal").modal('show');
            var id = $(this).closest('tr').find('.count').data('id');
            var name = $(this).closest('tr').find('.count').data('name');
            $(".ed_category_name").val(name);
            $(".category_id").val(id);
        });


        $("body").on('click' , '.edit_category', function(e){
           var id = $('.category_id').val();
            var name = $('.ed_category_name').val();
            var tr = $(this).closest('tr');
            

            //console.log(value);

            $.ajax({
                url: '/category-update/',
                mehtod:"get",
                data: {
                id : id ,
                name : name
                },
                success:function(data)
                {
                //   

                   $('#name_'+id).html(data.name);
                    console.log(data.id);

                    console.log(data.name);
                    console.log($('#name_'+id));
                    console.log( $('#name_'+id).html(data.name));
                }

            });
});


    
    $(document).on('click', '.category-delete-btn', function(){
        if(confirm("Are you sure you want to Delete this data?"))
        {
            var id = $(this).closest('tr').find('.count').data('id');
            var tr = $(this).closest('tr');
            $.ajax({
                url: '/category-delete/',
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
