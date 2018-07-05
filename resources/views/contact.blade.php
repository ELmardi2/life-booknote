@extends('defaults.default')
@section('content') <!--start content section-->
<h2 class="text-center mt-5"> Welcome to contact-us page!!!</h2>
@if ($errors->all())
<div class=" alert alert-danger">
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
<form action="{{url('Send')}}" method="POST">
        @csrf
        @method('POST')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" name="name" id="Name" class="form-control" placeholder="type your name here">
    </div>
    <div class="form-group">
            <label for="title">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="type your email here">
        </div>
        <div class="form-group">
                <label for="title">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="type your subject here">
            </div>
    <div class="form-group">
        <label for="title">Write Your message</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="type your message here"></textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-outline-primary"> Send</button>
    </div>
    </form>
@stop <!--End content section-->