@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Permission</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td><img src="{{ $user->profile->avatar}}" alt="{{$user->name}}" width="50px" height="50px" border-radius="50%"></td>
                    <td>{{$user -> name}}</td>
                    <td>
                       @if($user->admin == 1)
                            <a class="btn btn-danger btn-xs" href="{{route('user.admin',["id"=>$user->id])}}">
                                remove permissions
                            </a>
                       @else
                            <a class="btn btn-info btn-xs" href="{{route('user.admin',["id"=>$user->id])}}">
                                make admin
                            </a>
                       @endif
                    </td>
                    <td>
                        <a class="btn btn-danger btn-xs" href="{{route('user.delete',["id"=>$user->id])}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No users</th>
            </tr>
        @endif

        </tbody>

    </table>

@stop