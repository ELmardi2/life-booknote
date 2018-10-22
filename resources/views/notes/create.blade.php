@extends('defaults.default')
@section('title', 'create-notes') <!-- Page title -->
@section('content') <!--Start section content-->
<h1 class="my-5 text-center">Add A New Note</h1>
@if ($errors->all()) <!-- Start if errors -->
<div class="alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
         </li> 
     @endforeach
</div>
@endif <!-- End if errors -->
@if (session()->has('message'))<!-- Start if messages -->
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif  <!-- End If messages-->

<form action="{{route('notes.store')}}" method="POST"><!-- Start form add note-->
    @csrf
    @method('POST')
<div class="form-group">
    <label for="title">Object</label>
    <input type="text" name="object" id="object" class="form-control" placeholder="type your object here">
</div>
<div class="form-group">
        <label for="addingtime">Addingtime</label>
<input name="addingtime" type="date" value="" placeholder="DD/MM/YY"/> <i class="fa fa-calendar"></i>
</div>
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea name="comment" id="comment" class="form-control" cols="10" rows="4"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-outline-primary"> Add your note</button>
</div>
</form><!-- End form add note-->
@stop <!-- End section content-->