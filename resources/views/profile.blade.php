@extends('defaults.default') @section('content')
<div class="container">
    <h3 class="text-center pt-5">
        Welcome
        <strong>{{ Auth::user()->name }}</strong>
        To Your Profil In Life-booknote
    </h3>
    <hr>
        @if ($errors->all())
        <div class="alert-danger">
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </div>
        @endif @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif
        <form
            action="{{route('avatar.store')}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group input-group m-3">
                <div class=" input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class=" custom-file">
                    <input
                        type="file"
                        name="avatar"
                        class="custom-file-input"
                        id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                <input type="submit" value="upload" class="btn btn-success ml-4">
            </div>
        </form>
    <div class="card-columns">
        @foreach ($avatars as $avatar)
        <div class="card">
            <img class="card-img-top" src="{{$avatar->getUrl()}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Image title</h5>
                <p class="card-text">This is a wider Image with supporting text below as a
                    natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">
                    <small class="text-muted">{{$avatar->created_at->diffForHumans()}}</small>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection