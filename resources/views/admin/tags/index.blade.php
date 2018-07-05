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
        @if(count($tags) > 0)
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->tag}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('tag.edit',["id"=>$tag->id])}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-xs" href="{{route('tag.delete',["id"=>$tag->id])}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No tags</th>
            </tr>
        @endif
    </table>

@stop