@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new category
        </div>
        <div class="panel-body">
                <form action="{{route('category.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name..">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store Category</button>
                    </div>
                </form>
        </div>
    </div>

@stop