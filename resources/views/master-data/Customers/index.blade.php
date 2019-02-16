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
            <a class="btn btn-success" href="{{route('customers.create')}}"></i class="fa fa-plus"></i>Create Customer</a>
        </div>

        <div class="portlet-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name </th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('customers.show',$customer->id)}}">{{$customer->name}}</a></td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('customers.destroy', $customer->id)}}" >
                                    @method('delete')
                                    @csrf
                                    <a href="{{route('customers.edit',$customer->id)}}" Class="btn btn-info"> <i Class="fa fa-lg fa-pencil"></i></a>

                                    <button type="submit" Class="btn btn-danger">
                                        <i Class="fa fa-lg fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="text-center">
                    {{$customers->links()}}
                </div>
        </div>
    </div>
</div>
@endsection

