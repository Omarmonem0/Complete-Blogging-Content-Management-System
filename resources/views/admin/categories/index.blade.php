@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        @if(count($categories) > 0)
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{route('category.edit',["id"=>$category->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger btn-xs" href="{{route('category.delete',["id"=>$category->id])}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>

            </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No categories</th>
            </tr>
        @endif
    </table>

    @stop