@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
<form class="form" method="post" action="{{route('users.update',['id'=>$user->id])}}" id="user-form">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">Edit User </span>
                </div>
            </div>

            <div class="portlet-body form">
                @csrf
                @method('put')
                
                <div class="row">
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                        <label class="col-md-2">Name : </label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$user->name}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label class="col-md-2">Email : </label>
                        <div class="input-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$user->email}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                        <label class="col-md-2">Address : </label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$user->address}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group {{$errors->has('jop') ? 'has-error' : ''}}">
                        <label class="col-md-2">Jop : </label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="jop" placeholder="Enter Jop" value="{{$user->jop}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                        <label class="col-md-2">User Type : </label>
                        <div class="input-group col-md-6">
                            <select name="type" id="phonename" class="form-control type" data-live-search="true" >
                                <option value="admin" {{($user->type =="admin" ? 'selected' : '')}}>Admin</option>
                                <option value="user" {{($user->type =="user" ? 'selected' : '')}}>User</option>
                            </select> 
                        </div>
                    </div>
                </div>


                <!-- --------------------------- Edit multiple phones ---------------------- -->
                <br />

                <br />
                <div class="row">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Phone Name</td>
                                <td>Phone No</td>
                                <td>is primary </td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody id="item_body">
                            <tr id="clone" hidden>
                                <td class="counter" width="3%"></td>
                                <td width="50%">
                                    <!-- <input type="text" name="phonename" class="form-control phonename" placeholder="Enter Phone name" data-live-search="true" > -->
                                    <select name="phone_type" class="form-control phone_type" data-live-search="true" >
                                        <option value="personal">personal</option>
                                        <option value="Home">Home</option>
                                        <option value="work">work</option>
                                        <option value="other">other</option>
                                    </select>
                                </td>
                                <td width="15%">
                                    <input type="text" class="form-control phone_no" name= "phone_no" placeholder="Enter Phone no" step="any">
                                </td>
                                <td width="4%">
                                        <input type="checkbox" value="1" name="isprimary" id="isprimary" class="form-control isprimary"  >
                                <td width="5%">
                                    <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button></td>
                                <td width="5%">
                                    <button class="btn btn-danger remove" type="button"><i  class="fa fa-times"></i></button>
                                </td>
                            </tr>

                            @php
                            $count = $user->userphones->count()
                            @endphp
                            @if($user->userphones->count() == 0)


                            <tr id="clone0">
                                <td width="3%">1</td>
                                <td width="50%">
                                    <!-- <input type="text" name="phones[0][phonename]" value="" class="form-control  phonename" placeholder="Enter Phone name" data-live-search="true" required> -->
                                    <select name="phones[0][phone_type]" class="form-control phone_type" data-live-search="true" >
                                    <option value="personal">personal</option>
                                    <option value="Home">Home</option>
                                    <option value="work">work</option>
                                    <option value="other">other</option>
                                    </select>
                                </td>

                                <td width="15%">
                                    <input type="text" class="form-control phone_no" value = "" step="any" name="phones[0][phone_no]" id="phone_no" required>
                                </td>
                                <td width="4%">
                                    <input name="phones[0][isprimary]" id="isprimary" class="form-control isprimary" type="checkbox" value="1">
                                </td>
                                <td width="5%">
                                    <button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button>
                                </td>
                                <td width="5%"> </td>
                            </tr>
                            @else
                            @foreach($user->userphones as $phone)
                            <tr id="clone{{$loop->iteration}}">
                                <td width="3%">{{$loop->iteration}}</td>
                                <td width="50%">
                                    <!-- <input type="text" value="{{$phone->phonename}}" class="form-control phonename" step="any" name="phones[{{$loop->iteration}}][phonename]" id="phonename" data-live-search="true"  placeholder="Enter Phone name" > -->
                                    <select name="phones[{{$loop->iteration}}][phone_type]" id="phone_type" class="form-control phone_type" data-live-search="true" >
                                        <option value="personal" {{($phone->phone_type =="personal" ? 'selected' : '')}}>personal</option>
                                        <option value="Home" {{($phone->phone_type =="Home" ? 'selected' : '')}}>Home</option>
                                        <option value="work" {{($phone->phone_type =="work" ? 'selected' : '')}}>work</option>
                                        <option value="other" {{($phone->phone_type =="other" ? 'selected' : '')}}>other</option>
                                    </select>
                                </td>
                                <td width="15%">
                                    <input type="text" value="{{$phone->phone_no}}" class="form-control phone_no" step="any" name="phones[{{$loop->iteration}}][phone_no]" id="phone_no">
                                </td>
                                <td width="4%">
                                    <input name="phones[{{$loop->iteration}}][isprimary]" id="isprimary" class="form-control isprimary" type="checkbox" value="{{$phone->isprimary}}" {{($phone->isprimary =="1" ? 'checked' : '')}}>
                                    </td>
                                <td width="5%">
                                    <button class="btn btn-success add" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button></td>
                                <td width="5%">
                                    <button class="btn btn-danger remove" type="button">
                                    <i  class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

                <!-- --------------------------- End Edit multiple phones ---------------------- -->



           
            </div>
        </div>
    </div>
        <div class="form-actions">
            <button type="submit" class="btn blue">Save</button>
            <a href="{{route('users.index')}}" class="btn default">Cancel</a>
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
            var count = {{$count}} ;



            table_body.on('click' , '.add' , function(e)
            {
                e.preventDefault();
                ++count;
                var tr_clone = $('#clone').clone();
                tr_clone.prop('hidden' , '');
                tr_clone.find('#clone').attr('id','clone'+count);
                tr_clone.find('.counter').html(count);
                tr_clone.find('.phone_type').attr('name' , 'phones['+count+'][phone_type]');
                tr_clone.find('.phone_type').attr('required' , true);
                tr_clone.find('.phone_no').attr('name' , 'phones['+count+'][phone_no]');
                tr_clone.find('.phone_no').attr('required' , true);

                tr_clone.find('.isprimary').attr('name' , 'phones['+count+'][isprimary]');
               // tr_clone.find('.isprimary').attr('required' , true);

               table_body.append(tr_clone);
            });

            table_body.on('click' , '.remove' , function(e){
                e.preventDefault();
                count--;

                $(this).closest('tr').remove();
            });
        })
    </script>
@endpush
