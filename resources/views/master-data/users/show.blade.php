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
                        <span class="caption-subject bold uppercase">Welcome {{$user->name}}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name"   value="{{$user->name}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-2">Email: </label>
                            <div class="input-group col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email"   value="{{$user->email}}" disabled>
                            </div>
                        </div>
                    </div>

            
                    <div class="row">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label class="col-md-2">Address: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Address"   value="{{$user->address}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('jop') ? 'has-error' : ''}}">
                            <label class="col-md-2">Jop: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="jop" placeholder="Jop"   value="{{$user->jop}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                            <label class="col-md-2">Type: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="type" placeholder="Type"   value="{{$user->type}}" disabled>
                            </div>
                        </div>
                    </div>



            <!-- ----------------- Show Multiple Phones ----------------- -->

            <div class="row">
                <div class="form-group {{$errors->has('phones') ? 'has-error' : '' }}">
                    <label class="col-md-2">Phones : </label>
                    <div class="input-group col-md-6">
                        <table class="table table-responsive table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Phone Type </th>
                                        <th scope="col">Phone No </th>
                                        <th scope="col">Is Primary </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td>
                                            <ui> 
                                                @foreach($user->userphones as $phone)
                                                    <li> {{$phone->phone_type}} </li>
                                                @endforeach
                                            </ui>
                                        </td>
                                        <td>
                                            <ui>
                                            @foreach($user->userphones as $phone)
                                                <li> {{$phone->phone_no}}</li>
                                            @endforeach
                                            </ui>
                                        </td>
                                        <td>
                                            <ui>
                                            @foreach($user->userphones as $phone)
                                                @if($phone->isprimary  ==1 )
                                                    <li> Y </li>
                                                @elseif($phone->isprimary == 0)
                                                    <ol></ol>
                                                @endif
                                            @endforeach
                                            </ui>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- --------------- End Show Multiple Phones --------------- -->







                    <div class="form-actions">
                        <a href="{{route('users.index')}}" class="btn blue">Back</a>
                    </div>

            </div>
        </div>
                




@endsection


