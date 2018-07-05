@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit {{$tag->name}}
        </div>
        <div class="panel-body">
            <form action="{{route('tag.update',["id"=>$tag->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="tag" value="{{$tag->name}}">
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update tag</button>
                </div>
            </form>
        </div>

    </div>
@stop