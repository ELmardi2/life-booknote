@extends('defaults.default')

@section('title', 'notes-page') <!--page title-->
@section('content') <!--start content section-->
<h1 class="text-center mt-5"> Welcome to your notes  page!!!</h1>
@auth
<a href="{{url('/home')}}" class=" btn btn-primary"> Back</a>
@endauth
@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif <!--End If Message errors -->
@if (count($user->notes) > 0)
@foreach ($user->notes as $note) <!--start foreach -->
<div class="card mt-4">
    <div class="card-header">
        <h3>
             {{$user->note->object}}
        </h3>
    </div>
        <div class="card-body">
            <p>
                {{str_limit(strip_tags($note->comment), 30)}}
                @if (strlen(strip_tags($note->comment)) > 30)
                <a href="{{route('notes.show', $note->id)}}" class="btn btn-info-sm">Read More</a>
                @endif
            </p>
        <hr>
        <span class="btn btn-info">
            <i class="fa fa-calendar"></i> {{$note->created_at}}
        </span> 
        &nbsp;   
        <span class="btn btn-success">
            <i class="fa fa-user"></i>{{$note->user->name}}
        </span> 
    </div>
</div>
@endforeach <!--End foreach -->
 <!-- the rest pages --> 
@else
<div class="alert alert-info text-center"> <strong>OH Sorry There is No Notes To Show For The Moment !!!!!!!</strong> </div>
@endif <!-- End If -->

@stop <!--End content section-->
