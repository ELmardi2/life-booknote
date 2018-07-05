@extends('defaults.default')


@section('title', 'create-history')

@section('content')
<h1 class="my-5 text-center">Add Av Story</h1>
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
<form action="{{route('stories.store')}}" method="POST">
    @csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="type your title here">
</div>
<div class="form-group">
    <label for="detail">Detail</label>
    <textarea name="detail" id="detail" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <select name="status" id="">
        <option value="true">public</option>
        <option value="true">Private</option>
    </select>
</div>
<div class="form-group">
<button type="submit" class="btn btn-outline-primary"> Add An Story</button>
</div>
</form>
@stop