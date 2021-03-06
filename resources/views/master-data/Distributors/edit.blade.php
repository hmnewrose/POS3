@extends('layouts.layout')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif

    <form class="form" method="post" action="{{route('disty.update' , ['id'=>$disty->id])}}" id="disty-form">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Edit Company</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-2">Name:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Name" value="{{$disty->name}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                            <label class="col-md-2">Phone:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="phone"
                                       placeholder="Phone" value="{{$disty->phone}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label class="col-md-2">Address:</label>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control" name="address"
                                       placeholder="address" value="{{$disty->address}}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-2">Email:</label>
                            <div class="input-group col-md-6">
                                <input type="email" class="form-control" name="email"
                                       placeholder="Email" value="{{$disty->email}}">
                            </div>
                        </div>
                    </div>



               
                </div>

            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn blue">Save</button>
            <a href="{{route('disty.index')}}" class="btn default">Cancel</a>
        </div>

    </form>







    
@endsection
