@extends('layouts.layout')
@section('content')

<div class="col-md-12">

    <div class="portlet light bordered">
        <div class="portlet-title">
            <a class="btn btn-success" href="{{route('offers.create')}}"><i class="fa fa-plus"></i> Create Special Offer</a>
        </div>
        <div class="portlet-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Offer Name</th>
                        <th>Start Date</th>
                        <th>Expire Date</th>
                        <th>Item Name</th>
                        <th>Item Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offerheader as $oh)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- <td>{{$oh->offername}}</td> -->
                            <td><a href="{{route('offers.show',$oh->id)}}">{{$oh->offername}}</a></td>

                            <td>{{$oh->start_date}}</td>
                            <td>{{$oh->expire_date}}</td>

                            <td>
                                <ui>
                                    @foreach($oh->offerdetails as $detail)
                                        <ol>{{$detail->item->name}}</ol>
                                    @endforeach
                                </ui>
                              

                            </td>

                            <td>
                                <ui>
                                    @foreach($oh->offerdetails as $detail)
                                        <ol>{{$detail->dis_item_value}}</ol>
                                    @endforeach
                                </ui>
                            </td>
                            <td>
                                <form method="post" action="/offers/{{$oh->id}}" >
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('offers.edit',$oh->id)}}" Class="btn btn-info">
                                    <i Class="fa fa-lg fa-pencil"></i></a>
                                    <button onclick="return confirm('Are you sure to delete this Offer')" type="submit" Class="btn btn-danger" >
                                    <i Class="fa fa-lg fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                </tbody>
            </table>

                <div class="text-center">
                    {{$offerheader->links()}}

                </div>


        </div>


    </div> <!--- End portlet light bordered --->
@endsection
