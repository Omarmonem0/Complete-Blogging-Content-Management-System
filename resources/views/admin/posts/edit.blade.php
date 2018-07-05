@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update: {{$post->title}}
        </div>
        <div class="panel-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">Image</label>
                    <input type="file" class="form-control" name="featured">
                </div>
                <div class="form-group">
                    <label for="Category">Select a category</label>
                    <select name="category_id"  class="form-control" style="height: 30px">
                        @foreach($categories as $category)
                            <option class="form-control" value="{{$category->id}}"
                            @if($post->category->id == $category->id)
                                selected
                                @endif>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <label for="tags">Select tags</label>
                    <br>
                    @foreach($tags as $tag)
                        <label for="tag">
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]"
                               @foreach($post->tags as $t)
                               @if($tag->id == $t->id)
                               checked
                                @endif
                                @endforeach>
                             {{$tag->tag}}
                        </label>
                    <br>
                @endforeach
                 </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="body"  cols="5" rows="5" class="form-control" >{{$post->content}}</textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>

            </form>
        </div>
    </div>
@stop