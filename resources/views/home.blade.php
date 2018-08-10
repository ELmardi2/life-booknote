@extends('defaults.default')
@section('content')
<div class="container">
       <div class="card-header">
            <h3 class="text-center pt-5">
                    Welcome <strong>{{ Auth::user()->name }}</strong> To Your Profil In  Life-booknote
                </h3>
       </div>
    <div class="row">
            <div class="col-md-5">
                    <div class="card">
                            <div class="card-header">
                                    <h4 class="pull-left d-inline-block">Profil</h4>
                                    <h4 class="d-inline-block pull-right btn btn-default btn-sm">
                                            <a href="/articles/create">
                                                <i class="fa fa-plus"></i> New Article
                                                </a>
                                    </h4>
                                </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <h4>Your Articles</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>create</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @if (count($articles) > 0) <!--start if articles count -->
                                            @foreach ($articles as $article) <!--start foreach -->
                                            <tr>
                                            <td>{{$article->title}}</td>
                                            <td>{{$article->created_at->diffForHumans()}}</td>
                                            <td>
                                                    <a  href="{{route('articles.edit', $article->id)}}" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit !
                                                    </a> 
                                            </td>
                                            <td>
                                              <form action="{{route('articles.destroy', $article->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this article !?')" class="d-inline-block" action="{{route('articles.destroy', $article->id)}}" method="POST"> 
                                                 @csrf <!--protect my form csrf -->
                                                    @method('DELETE') 
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Delete</button>
                                             </form>
                                            </td>
                                            </tr>
                                            @endforeach<!--End foreach -->
                                            @else
                                            <div class="alert alert-info text-center"> <strong>OH Sorry There is No Articles To Show For The Moment !!!!!!!</strong> </div>
                                            @endif <!-- End If  articles count-->
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>    
        <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-inline-block">Profil</h4>
                        <h4 class="d-inline-block pull-right btn btn-default btn-sm">
                                <a href="/stories/create">
                                    <i class="fa fa-plus"></i> New Story
                                    </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h4>Your histories</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>create</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                        @if (count($stories) > 0)  <!--start history count -->
                                        @foreach ($stories as $story) <!--start foreach -->
                                        <tr>
                                        <td>{{$story->title}}</td>
                                        <td>{{$story->created_at->diffForHumans()}}</td>
                                        <td>
                                                <a  href="{{route('stories.edit', $story->id)}}" class="btn btn-secondary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit !
                                                </a> 
                                        </td>
                                        <td>
                                          <form action="{{route('stories.destroy', $story->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this history !?')"
                                             class="d-inline-block" action="{{route('stories.destroy', $story->id)}}" method="POST"> 
                                             @csrf <!--protect my form csrf -->
                                                @method('DELETE') 
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Delete</button>
                                         </form>
                                        </td>
                                        </tr>
                                        @endforeach <!-- End foreach history -->  
                                        @else
                                            <div class="alert alert-info text-center"> <strong>OH Sorry There is No Stories To Show For The Moment !!!!!!!</strong> </div>
                                            @endif <!-- End If history count-->
                                        
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
            <div class="col-md-5">
                    <div class="card">
                            <div class="card-header">
                                    <h4 class="pull-left d-inline-block">Profil</h4>
                                    <h4 class="d-inline-block pull-right btn btn-default btn-sm">
                                            <a href="/notes/create">
                                                <i class="fa fa-plus"></i> New Note
                                                </a>
                                    </h4>
                                </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <h4>Your Notes</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Addingtime</th>
                                            <th>Edit</th>
                                            <th>elete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @if(count($notes) > 0) <!--start if notes count -->
                                            @foreach ($notes as $note) <!--start foreach -->
                                            <tr>
                                            <td>{{$note->object}}</td>
                                            <td>{{$note->addingtime}}</td>
                                            <td>
                                                    <a  href="{{route('notes.edit', $note->id)}}" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-edit"></i> Edit !
                                                    </a> 
                                            </td>
                                            <td>
                                              <form action="{{route('notes.destroy', $note->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this note !?')" class="d-inline-block" action="{{route('notes.destroy', $note->id)}}" method="POST"> 
                                                 @csrf <!--protect my form csrf -->
                                                    @method('DELETE') 
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Delete</button>
                                             </form>
                                            </td>
                                            </tr>
                                            @endforeach<!--End foreach -->
                                            @else
                                            <div class="alert alert-info text-center"> <strong>OH Sorry There is No Notes To Show For The Moment !!!!!!!</strong> </div>
                                            @endif <!-- End If  articles count-->
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
    <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline-block">Profil</h4>
                    <h4 class="d-inline-block pull-right btn btn-default btn-sm">
                            <a href="/videos/create">
                                <i class="fa fa-plus"></i> New Video Story
                                </a>
                    </h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4>Your videos histories</h4>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
