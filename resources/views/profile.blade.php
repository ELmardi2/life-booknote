@extends('defaults.default')
@section('content')
<div class="container">
    <h3 class="text-center pt-5">
        Welcome <strong>{{ Auth::user()->name }}</strong> To Your Profil In  Life-booknote
    </h3>
    <hr>
        <div class="row">
        <form action="{{route('avatar.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
               <div class="form-group input-group m-3">
                   <div class=" input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                      <div class=" custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                       </div>
                       <input type="submit" value="upload" class="btn btn-success ml-4">
                  </div>
            </form>
       </div>
       @foreach ($avatars as $avatar)
           {{$avatar}}
       @endforeach
</div>
@endsection
