@extends('defaults.default')
@section('title', 'notes-page') <!--page title-->

@section('content') <!--start content section-->
<h2 class="text-center mt-5"> Welcome to your notes page!!!</h2>
@auth
<a href="{{url('/home')}}" class=" btn btn-primary"> Back</a>
@endauth

@if (session()->has('message')) <!--start session section-->
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif                            <!--End session section-->
<div class="card">
    <div class="card-header">
    <h1>{{$note->object}}</h1>
    </div>
    <div class="card-body">
        <h6>
            <i class="fa fa-calendar">
                    {{$note->addingtime}}
            </i>
        </h6>
        <hr>
        <p>
            {{$note->comment}}
        </p>
    </div>
</div>
<hr>
<!--start show buttons edit&delete section-->
@if (!Auth::guest() && (Auth::user()->id == $note->user_id))
<a  href="{{route('notes.edit', $note->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit !</a>
    <form action="{{route('notes.destroy', $note->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this note !?')" class="d-inline-block" action="{{route('notes.destroy', $note->id)}}" method="POST"> 
        @csrf <!--protect my form csrf -->
        @method('DELETE') 
        <button type="submit" class="btn btn-danger"> <i class="fa fa-close"></i> Delete</button>
     </form>
     @endif  
<!--End show buttons edit&delete section-->


@stop <!--End content section-->
