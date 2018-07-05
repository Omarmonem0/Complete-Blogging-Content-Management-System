@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new tag
        </div>
        <div class="panel-body">
            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="tag" placeholder="Enter Tag Name..">
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store tag</button>
                </div>
            </form>
        </div>
    </div>

@stop