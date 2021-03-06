@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
    <form class="form" method="post" action="{{route('disty.store')}}" id="brand-form">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold">Create Company</span>
                    </div>
                </div>
                
                <div class="portlet-body form">
                    @csrf
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('contact_person') ? 'has-error' : ''}}">
                            <label class="col-md-2">Contact Person:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="contact_person" placeholder="Enter Contact Person" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('Jop') ? 'has-error' : ''}}">
                            <label class="col-md-2">Jop:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="jop" placeholder="Enter Contact Person Jop" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                            <label class="col-md-2">Phone:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone No" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label class="col-md-2">Address:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Enter Company address" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-2">Email:</label>
                            <div class="input-group col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Enter Company Email" >
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                            <label class="col-md-2">Type:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="type" placeholder="Enter Company Type" >
                            </div>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn blue">Save</button>
                        <a href="{{route('disty.index')}}" class="btn default">Cancel</a>
                    </div>

            </div>
        </div>
    </form>
    @endsection


