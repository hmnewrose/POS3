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
            <a class="btn btn-success" href="{{route('disty.create')}}"></i class="fa fa-plus"></i>Create Company</a>
        </div>

        <div class="portlet-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name </th>
                        <th>contact_person</th>
                        <th>Jop</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($disties as $disty)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('disty.show',$disty->id)}}">{{$disty->name}}</a></td>
                            <td>{{$disty->contact_person}}</td>
                            <td>{{$disty->jop}}</td>
                            <td>{{$disty->type}}</td>
                            <td>{{$disty->phone}}</td>
                            <td>{{$disty->address}}</td>
                            <td>{{$disty->email}}</td>
                            <td>{{$disty->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('disty.destroy', $disty->id)}}" >
                                    @method('delete')
                                    @csrf
                                    <a href="{{route('disty.edit',$disty->id)}}" class="btn btn-info">
                                        <i class="fa fa-lg fa-pencil"></i></a>
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
                    {{$disties->links()}}
               </div>
        </div>
    </div>
</div>
@endsection

