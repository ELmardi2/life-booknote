@extends('defaults.default')

@section('content') <!--start content section-->
<h2 class="text-center"> Welcome to home page!!!</h2>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="{{asset('images/sslogo.png')}}" alt="Chicago" style="width:100%; height: 80%;">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/lify.png')}}" alt="Chicago" style="width:100%; height: 80%;">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/lolife.png')}}" alt="Chicago" style="width:100%; height: 80%;">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/lifes.png')}}" alt="Chicago" style="width:100%; height: 80%;">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/scr-logo.png')}}" alt="Chicago" style="width:100%; height: 80%;">
      </div>
      <div class="carousel-item">
        <p class="lead">
            Histo-act is it an application and site web  the idea is to create an application and web site (Blog)
    This blog can be considered as a collaborative space, or platform allowing the different users to express themselves on various topics. 
    Topics divide into two categories</p>:
    <blockquote>
    story: the user can write a story about an experience in his life, or a personal event or events already  happened  in addition to the personal notes.
    There  will has two type of stories:
    -  Public stories (it can be visible by the others)
    - Private stories (it will be visible only the writer himself 
    Article: the user can write a "ticket" on different topics, for example technological article or sports or economic………. etc 
    </blockquote>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@stop <!--End content section-->