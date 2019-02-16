@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
    <form class="form" method="post" action="{{route('users.store')}}" id="brand-form">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Create User</span>
                    </div>
                </div>

                <div class="portlet-body form">

                    @csrf
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Name" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-2">Email: </label>
                            <div class="input-group col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label class="col-md-2">Password:</label>
                            <div class="input-group col-md-6">
                                <input type="password" class="form-control" name="password"
                                       placeholder="Password">
                            </div>
                        </div>
                    </div>

                    
                    

                    <div class="row">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">                            <label class="col-md-2">Address: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Enter address">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('jop') ? 'has-error' : ''}}">                            <label class="col-md-2">Jop: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="jop" placeholder="Enter jop">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                            <label class="col-md-2">User Type: </label>
                            <div class="input-group col-md-6">
                                <select name="type" id="type" placeholder="Enter User type" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user" selected='selected'>User</option>
                                </select>

                            </div>
                        </div>
                    </div>


                  
                    <!-- --------------------------- add Multiple phones ---------------------- -->
                    <br />

                    <br />


                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Phone Type</td>
                                <td>Phone No</td>
                                <td>is primary </td>
                                <td colspan="2">Action</td>
                            </tr>
                            </thead>
                            <tbody id="item_body">
                                <tr id="clone" hidden>
                                <td class="counter" width="1%"></td>
                                <td width="5%">
                                    <!-- <input type="text" name="phonename" class="form-control phonename" placeholder="Enter Phone name" data-live-search="true" > -->
                                    <select name="phone_type" class="form-control phone_type" data-live-search="true" >
                                        <option value="personal">Personal</option>
                                        <option value="Home">Home</option>
                                        <option value="work">Work</option>
                                        <option value="other">Other</option>
                                    </select>
                                </td>

                                <td width="8%">
                                    <input type="text" class="form-control phone_no" name= "phone_no" placeholder="Enter Phone no" step="any">
                                </td>
                                <td width="4%">
                                    <input name="isprimary" class="form-control isprimary" type="checkbox" value="1">
                                </td>

                                <td width="2%">
                                    <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button></td>
                                <td width="2%">
                                    <button class="btn btn-danger remove" type="button"><i  class="fa fa-times"></i></button>
                                </td>
                            </tr>


                            <tr id="clone1">
                                <td width="1%">1</td>
                                <td width="5%">
                                    <!-- <input type="text" name="phones[1][phonename]" class="form-control  phonename" placeholder="Enter Phone name" data-live-search="true" required> -->

                                    <select name="phones[1][phone_type]" class="form-control phone_type" data-live-search="true" >
                                        <option value="personal">Personal</option>
                                        <option value="Home">Home</option>
                                        <option value="work">Work</option>
                                        <option value="other">Other</option>
                                    </select>
                                </td>

                                <td width="8%">
                                    <input type="text" class="form-control phone_no" step="any" name="phones[1][phone_no]" required>
                                </td>
                                <td width="4%">
                                    <input type="checkbox" class="form-control isprimary" step="any" name="phones[1][isprimary]" value="1">
                                </td>

                                <td width="2%">
                                    <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button>
                                </td>

                                <td width="5%"> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>






                    <!-- ---------------------------  End add Multiple phones ---------------------- -->




                    


                </div>
            </div>
        </div>
            <div class="form-actions">
                <button type="submit" class="btn blue">Save</button>
                <a href="{{route('users.index')}}" class="btn default">Cancel </a>
            </div>

    </form>


@stop



@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
 crossorigin="anonymous">
</script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="{{ asset('admin/scripts/moment.min.js') }}"></script>
    <script src="{{ asset('admin/scripts/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        $(document).ready(function () {
            var table_body = $('#item_body');
            var count = 1 ;
            //var isprimary=$('.isprimary');



            table_body.on('click' , '.add' , function(e)
            {
                e.preventDefault();
                ++count;
                var tr_clone = $('#clone').clone();
                tr_clone.prop('hidden' , '');
                tr_clone.find('#clone').attr('id','clone'+count);
                tr_clone.find('.counter').html(count);
                tr_clone.find('.phone_type').attr('name' , 'phones['+count+'][phone_type]');
                tr_clone.find('.phonename').attr('required' , true);
                tr_clone.find('.phone_no').attr('name' , 'phones['+count+'][phone_no]');
                tr_clone.find('.phone_no').attr('required' , true);
                tr_clone.find('.isprimary').attr('name' , 'phones['+count+'][isprimary]');
                table_body.append(tr_clone);

            });

            table_body.on('click' , '.remove' , function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            });
        })
    </script>
@endpush
