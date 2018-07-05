@extends('defaults.default')

@section('title', 'stories') <!--title of the page -->
 
<!-- what is  goining to show in this page as content-->
@section('content') <!--start content section-->
<h2 class="text-center mt-5"> Welcome to your stories page!!!</h2>
@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif
@if (count($stories) > 0)  <!--start history count -->
@foreach ($stories as $story ) <!--start foreach -->
<div class="card mt-4">
    <div class="card-header">
        <h3><!--title of the history -->
            {{$story->title}}
        </h3>
    </div>
    <div class="card-body">
       <p>
        {{str_limit(strip_tags($story->detail), 50)}}
        @if (strlen(strip_tags($story->detail)) > 50)
        <a href="{{route('stories.show', $story->id)}}" class="btn btn-info-sm">Read More</a>
        @endif
       </p>
        <hr>
        <span class="btn btn-info">
            <i class="fa fa-calendar"></i>{{$story->created_at->diffForHumans()}}
        </span> 
        &nbsp;
        <span class="btn btn-success">
            <i class="fa fa-user"></i>{{$story->user->name}}
        </span> 
    </div>
    </div>  
@endforeach <!--endforeach -->

<!--the rest of the histories -->
{{$stories->links()}}

@else
<div class="alert alert-info text-center"> <strong>OH Sorry There is No Sstory To Show For The Moment !!!!!!!</strong> </div>
@endif <!-- End If -->

@endsection <!--end content section -->