@extends('defaults.default')
@section('title', 'show-story') <!--section page title -->

@section('content') <!--start content section -->
<a href="{{url('/stories')}}" class=" btn btn-primary"> Back</a>
<hr>
<div class="card">
    <div class="card-header">
        <h1>{{$story->title}}</h1>
    </div>
    <div class="card-body">
        <p>
            {{$story->detail}}
        </p>
    </div>
</div>
<hr>
@if (!Auth::guest() && (Auth::user()->id == $story->user_id))
<a  href="{{route('stories.edit', $story->id)}}" class="btn btn-secondary">
    <i class="fa fa-edit"></i> Edit !
</a>
<form action="{{route('stories.destroy', $story->id)}}" method="POST" onsubmit="return confirm('Are You Sure that you want delete this article !?')" class="d-inline-block" action="{{route('stories.destroy', $story->id)}}"> 
    @csrf <!--protect my form csrf -->
    @method('DELETE') 
    <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Delete</button>
</form> 
@endif
@stop <!--end content section -->