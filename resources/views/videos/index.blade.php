@extends('defaults.default')

@section('title', 'videos') <!--title of the page -->
 
<!-- what is  goining to show in this page as content-->
@section('content') <!--start content section-->
<h2 class="text-center mt-5"> Welcome to all stories page!!!</h2>
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
@if (count($videos) > 0)  <!--start history count -->
@foreach ($videos as $video ) <!--start foreach -->
<div class="card mt-4">
    <div class="card-header">
        <h3><!--title of the history -->
            {{$video->title}}
        </h3>
    </div>
    <div class="card-body">
        <hr>
        <span class="btn btn-info">
            <i class="fa fa-calendar"></i>{{$video->created_at->diffForHumans()}}
        </span> 
        &nbsp;
        <span class="btn btn-success">
            <i class="fa fa-user"></i>{{$video->user->name}}
        </span> 
    </div>
    </div>  
@endforeach <!--endforeach -->

<!--the rest of the histories -->
{{$videos->links()}}

@else
<div class="alert alert-info text-center"> <strong>OH Sorry There is No  Video Story To Show For The Moment !!!!!!!</strong> </div>
@endif <!-- End If -->

@endsection <!--end content section -->