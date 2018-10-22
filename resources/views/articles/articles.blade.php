@extends('defaults.default')

@section('title', 'articles-page') <!--page title-->
@section('content') <!--start content section-->
<h1 class="text-center mt-5"> @lang('terms.welcome-to') </h1>
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
@endif
@if (count($articles) > 0)
@foreach ($articles as $article) <!--start foreach -->
<div class="card mt-4">
    <div class="card-header">
        <h3>
             {{$article->title}}
        </h3>
    </div>
        <div class="card-body">
            <p>
                {{str_limit(strip_tags($article->details), 50)}}
                @if (strlen(strip_tags($article->details)) > 50)
                <a href="{{route('articles.show', $article->id)}}" class="btn btn-info-sm">Read More</a>
                @endif
            </p>
        <hr>
        <span class="btn btn-info">
            <i class="fa fa-calendar"></i> {{$article->created_at->diffForHumans()}}
        </span> 
        &nbsp;   
        <span class="btn btn-success">
            <i class="fa fa-user"></i>{{$article->user->name}}
        </span> 
    </div>
</div>
@endforeach <!--End foreach -->
{{ $articles->links() }} <!-- the rest pages --> 
@else
<div class="alert alert-info text-center"> <strong>OH Sorry There is No Articles To Show For The Moment !!!!!!!</strong> </div>
@endif <!-- End If -->

@stop <!--End content section-->
