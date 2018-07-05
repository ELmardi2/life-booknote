@extends('defaults.default')

@section('title', 'create-story')

@section('content') <!--Start content section-->
<h1 class="my-5 text-center">Update The Story</h1>
@if ($errors->all())
<div class="alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
         </li> 
     @endforeach
</div>
@endif
@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif
<form action="{{route('stories.update', $story->id)}}" method="POST">
    @csrf
    @method('put')
<div class="form-group">
    <label for="title">Title</label>
<input type="text" name="title"  id="title" class="form-control" value="{{$story->title}}">
</div>
<div class="form-group">
    <label for="detail">Detail</label>
    <textarea name="detail"  id="detail" class="form-control" cols="30" rows="10">{{$story->detail}}</textarea>
</div>
<div class="form-group">
    <select name="status" id="">
        <option value="false">Public</option>
        <option value="true">Private</option>
    </select>
</div
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary"> Update The Story</button>
</div>
</form>
@stop <!--End content section-->