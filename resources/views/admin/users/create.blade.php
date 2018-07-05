@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new user
        </div>
        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter username..">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" type ="email" placeholder="Enter Email..">
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store user</button>
                </div>
            </form>
        </div>
    </div>

@stop