@extends('defaults.default')

@section('title', 'create-articles')

@section('content')
<h1 class="my-5 text-center">Add An Article</h1>
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
<form action="{{route('articles.store')}}" method="POST">
    @csrf
    @method('POST')
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="type your title here">
</div>
<div class="form-group">
    <label for="details">Details</label>
    <textarea name="details" id="details" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-outline-primary"> Add an Article</button>
</div>
</form>
@stop