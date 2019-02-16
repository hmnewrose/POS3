@extends('layouts.layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session('success')}}
        </div>
    @endif
    <div class="col-md-12">
        <div class="portlet light  bordered">
            <div class="portlet-title">
                <a class="btn btn-success" href="{{route('users.create')}}" ><i class="fa fa-plus"></i>Create Users</a>
            </div>
            <div class="portlet-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Phone_name</th>
                                <th>Phone_no</th>
                                <th>is Primary </th>
                                <th>Address</th>
                                <th>Jop</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('users.show',$user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>


                            <!-- --------------  show all phones ---------- -->


                                <td>
                                    <ui>
                                        @foreach( $user->userphones as $phone)
                                                <li>{{$phone->phone_type}}</li>
                                        @endforeach
                                    </ui>
                                </td>
                                <td>
                                    <ui>
                                        @foreach($user->userphones as $phone)
                                            <li>{{$phone->phone_no}}</li>
                                        @endforeach
                                    </ui>
                                </td>

                                <td>
                                    <ui>
                                        @foreach($user->userphones as $phone)
                                            @if($phone->isprimary == 1)
                                                <li>Y</li>
                                            @elseif($phone->isprimary == 0)
                                                <ol></ol>

                                            @endif
                                        @endforeach
                                    </ui>
                                </td>

                            <!-- -------------- End show all phones ---------- -->




                                <td>{{$user->address}}</td>
                                <td>{{$user->jop}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <form method="post" action="{{route('users.destroy',$user->id)}}" >
                                        @method('delete')
                                        @csrf
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">
                                        <i class="fa fa-lg fa-pencil"></i></a>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-lg fa-fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       </tbody>
                    </table>


            </div>
        </div>
    </div>
@endsection
