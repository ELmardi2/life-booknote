@extends('defaults.default')

@section('title', 'edit-note')

@section('content')
<h1 class="my-5 text-center">Update The Note</h1>
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
<form action="{{route('notes.update', $note->id)}}" method="POST">
        @csrf
        @method('put')
    <div class="form-group">
        <label for="title">Object</label>
    <input type="text" name="object" id="object" class="form-control" value="{{$note->object}}" placeholder="type your object here">
    </div>
    <div class="form-group">
            <label for="addingtime">Addingtime</label>
    <input name="addingtime" type="date"  value="{{$note->addingtime}}" placeholder="DD/MM/YY"/> <i class="fa fa-calendar"></i>
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control" cols="10" rows="4">{{$note->comment}}</textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-outline-primary"> Update your note</button>
    </div>
    </form>
@stop