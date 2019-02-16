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
                        <span class="caption-subject bold uppercase">{{$customer->name}}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name"   value="{{$customer->name}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                            <label class="col-md-2">Phone: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Phone"   value="{{$customer->phone}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label class="col-md-2">Address: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Address"   value="{{$customer->address}}" disabled>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-2">email: </label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="email"   value="{{$customer->email}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{route('customers.index')}}" class="btn blue">Back</a>
                    </div>

            </div>
        </div>
                




@endsection


