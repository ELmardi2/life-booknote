@extends('defaults.default')

@section('title', 'create-video-story')

@section('content')
<h1 class="my-5 text-center">Add A Video Story</h1>
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
<form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="type your title here">
</div>
<div class="form-group">
    <label for="video">Video </label>
</div>

<hr>
<div class="form-group">
    <select name="status" id="">
        <option value="1">public</option>
        <option value="0">Private</option>
    </select>
</div>
<div class="form-group">
<input type="submit" value="Upload">

</div>
</form>
@stop