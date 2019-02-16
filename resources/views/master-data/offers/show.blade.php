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
                        <span class="caption-subject bold uppercase">Offer </span>
                    </div>
                </div> <!-- End portlet-title -->

                <div class="portlet-body form">

                <div class="input-group col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Offers</div>
                                <div class="panel-body">
                    

                                    <div class="row">
                                        <div class="form-group {{$errors->has('offername') ? 'has-error' : ''}}">
                                            <label class="col-md-2">Offer Name: </label>
                                            <div class="input-group col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Item Name"   value="{{$offerheader->offername}}" disabled>
                                            </div>
                                        </div>
                                    </div> <!-- End row -->

                                    <div class="row">
                                        <div class="form-group {{$errors->has('start_date') ? 'has-error' : ''}}">
                                            <label class="col-md-2">Start Date:: </label>
                                            <div class="input-group col-md-6">
                                                <input type="date" class="form-control" name="start_date" placeholder="Offer Start Date"   value="{{$offerheader->start_date}}" disabled>
                                            </div>
                                        </div>
                                    </div> <!-- End row -->

                                    <div class="row">
                                        <div class="form-group {{$errors->has('expire_date') ? 'has-error' : ''}}">
                                            <label class="col-md-2">Expire Date: </label>
                                            <div class="input-group col-md-6">
                                                <input type="date" class="form-control" name="expire_date" placeholder="Offer Expire Date"   value="{{$offerheader->expire_date}}" disabled>
                                            </div>
                                        </div>
                                    </div> <!-- End row -->

                              
                    
                                    <div class="portlet-body">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>item_id</th>
                                                    <th>dis_item_value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($offerheader->offerdetails as $detail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$detail->item->name}}</td>
                                                        <td>{{$detail->dis_item_value}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div><!-- End panel-body --> 
                        </div><!-- End panel panel-primary --> 
                </div><!-- End input-group col-md-12 -->   

                    <div class="form-actions">
                        <a href="{{route('offers.index')}}" class="btn blue">Back</a>
                    </div>

                </div> <!-- End portlet-body form -->

            </div> <!-- End portlet light -->
        </div> <!-- End col-md-12 -->     

@endsection