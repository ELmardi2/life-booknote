

@if (!Auth::guest() && (Auth::user()->id == $article->user_id))
<a  href="{{route('articles.edit', $article->id)}}" class="btn btn-secondary">Edit !</a>
<form action="{{route('articles.destroy', $article->id)}}"  onsubmit="return confirm('Are You Sure that you want delete this article !?')" class="d-inline-block" action="{{route('articles.destroy', $article->id)}}" method="POST"> 
   @csrf <!--protect my form csrf -->
   @method('DELETE') 
   <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endif    

@auth
<a href="{{url('/home')}}" class=" btn btn-primary"> Back</a>
@endauth
                                    @auth
    <div class="bg-info text-white p-4 mb-3">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto pr-4">
                    <li><a href="{{url('/about')}}" class=" btn btn-secondary">About</a></li>
                    &nbsp;
                    <li><a href="{{url('/articles')}}" class=" btn btn-secondary">Articles</a></li>
                    &nbsp;
                    <li>  <a href="{{url('articles/create')}}" class=" btn btn-secondary">Add An Article</a></li>
                    &nbsp;
                    <li><a href="{{url('/histories')}}" class=" btn btn-secondary">Histories</a></li>
                    &nbsp;
                    <li>  <a href="{{url('histories/create')}}" class=" btn btn-secondary">Add A History</a></li>
                    &nbsp;
                    <li><a href="{{url('/contact')}}" class=" btn btn-secondary">Contact-us</a></li>
                </ul>
            </div>
        </div>
    </nav>
<form action="{{ route('logout') }}"  method="POST" class="d-inline-block float-right">
    @csrf
</form>
@else
<a href="{{route('login')}}">login</a>
@endauth
<div class="bg-info text-white p-4 mb-3">
    <a href="{{route('articles.index')}}" class=" btn btn-secondary">Articles</a>
    <a href="{{route('articles.create')}}" class=" btn btn-secondary">Create An Article</a>
    <a href="{{route('histories.index')}}" class=" btn btn-secondary">Histories</a>
    <a href="{{route('histories.create')}}" class=" btn btn-secondary">Create A History</a>
</div>
<!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('histories/create')}}" class=" ">
                                            <i class="fa fa-plus"></i>add history
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('articles/create')}}" class="">
                                            <i class="fa fa-plus"></i>add article
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </li>
                                    <li>
                                            <a href="{{url('/histories')}}" class=" btn btn-primary"> 
                                               <i class="fa fa-home"></i> Back
                                            </a>
                                    </li>
                                    <li class="divider"></li>
                                </ul>
                            </li>

                    </ul>

                    //app

                    <?php

                    namespace App;
                    
                    use Illuminate\Database\Eloquent\Model;
                    
                    class Comment extends Model
                    {
                    
                        protected $fillable = [
                            'content', 'user_id', 'article_id',
                    
                        ];
                    
                        public function article()
                        {
                            return $this->belongsTo('App\Article');
                        }
                        
                        public function user()
                        {
                            return $this->belongsTo('App\User');
                        }
                    
                    }
                    <?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\History;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request, Article $article)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);
        $comment = new Comment;
        $comment->content = $request->content;
        $user_id = $request->user_id;
        $article_id = $request->article_id;
        $article->comment()->save(comments);

            
        //$comments = App\Article::all()->comments;
    }
    public function store(Request $request, $slug)
    {
        $this->validate($request,[
            'content' => 'required | min:10 | max:350'
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();

        $userId = Auth::id();

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article()->associate($article);
        $comment->user_id = $userId;

        $comment->save();

        session()->flash('message', 'your Comment has been successfully added');
        
        return redirect()->route('articles.show', $slug)->with('success',' Comment  successfully added');

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $comments = Article::findOrFail('slug');

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);
        $article->comments()->save(comments);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
            