@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)
            <tr>
                <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="50px"></td>
                <td>{{$post -> title}}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{route('post.edit',["id"=>$post->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger btn-xs" href="{{route('post.delete',["id"=>$post->id])}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>

            </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No posts</th>
            </tr>
         @endif

        </tbody>

    </table>

@stop