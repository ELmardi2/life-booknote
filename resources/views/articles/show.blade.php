@extends('defaults.default')
@section('title', 'articles-page') <!--page title-->

@section('content') <!--start content section-->
<h2 class="text-center mt-5"> Welcome to articles page!!!</h2>
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
            <h1>{{$article->title}}</h1>
    </div>
    <div class="card-body">
        <p>
            {{$article->details}}
        </p>
    </div>
</div>
<hr>
<!--start show buttons edit&delete section-->
@if (!Auth::guest() && (Auth::user()->id == $article->user_id))
<a  href="{{route('articles.edit', $article->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit !</a>
    <form action="{{route('articles.destroy', $article->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this article !?')" class="d-inline-block" action="{{route('articles.destroy', $article->id)}}" method="POST"> 
        @csrf <!--protect my form csrf -->
        @method('DELETE') 
        <button type="submit" class="btn btn-danger"> <i class="fa fa-close"></i> Delete</button>
     </form>
     @endif  
<!--End show buttons edit&delete section-->
<div id="links" class="text-center">
<!--share links -->
<a href="https://www.facebook.com/sharer/sharer.php?u=">
    <i class="fa fa-facebook fa-4x"></i>
</a>
<a href="https://www.youtube.com/sharer/sharer.php?u=">
    <i class="fa fa-youtube fa-4x "></i>
</a>
<a href="https://help.instagram.com/sharer">
    <i class="fa fa-instagram fa-4x"></i>
</a>
<!-- End  share link -->
</div>
<!-- Start Comment show -->
<h2 class="text-center">Comments</h2>

<!-- End Comment show  -->

<!-- Start Comment form-->
<hr>
<div class="card">
    <div class="card-header">Leave your comment</div>
    <div class="card-body">
        <form method="POST" action="{{ url('/article/{$article->id}/comment'), $article->id }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <textarea name="content" id="content" class="form-control" cols="5" rows="2"></textarea>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary "> Add comment</button>
            </div>
        </form>
    </div>
</div>
<!-- End Comment form-->
@stop <!--End content section-->
