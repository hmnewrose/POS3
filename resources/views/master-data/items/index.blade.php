@extends('layouts.layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session('success')}}
        </div>
    @endif

<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <a class="btn btn-success" href="{{route('items.create')}}"><i class="fa fa-plus"></i> New Item </i></a>

        </div>

        <div class="portlet-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>    
                        <th> # </th>
                        <th> Name </th>
                        <th> Category </th>
                        <th> Size </th>
                        <th> Color </th>
                        <th> Qty </th>
                        <th> Barcode </th>
                        <th> Serial </th>
                        <th> price </th>
                        <th> Other Costs </th>
                        <th> Porfit Percent  </th>
                        <th> Sell Price </th>
                        <th> Created At </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('items.show',$item->id)}}">{{$item->name}}</a></td>
                        <td>{{optional($item->category)->name}}</td>
                        <td>{{optional($item->size)->size_name}}</td>
                        <td>{{optional($item->color)->color_name}}</td>
                        <td >{{$item->qty}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->serial}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->other_costs}}</td>
                        <td>{{$item->profit_percent}}</td>
                        <td>{{$item->sell_price}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                        
                            <form method="post" action="{{route('items.destroy',$item->id)}}" >
                                @method('delete')
                                @csrf
                                <a href="{{route('items.edit',$item->id)}}" Class="btn btn-info"> <i Class="fa fa-lg fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-lg fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                   
            </table>
                <div class="text-center">
                    {{$items->links()}}
                </div>
        </div> <!-------End portlet-body -- -->
    </div> <!-------End portlet light bordered -- -->
 </div> <!-------End col-md-12 -- -->

@endsection


