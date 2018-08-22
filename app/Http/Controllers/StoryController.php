<?php

namespace App\Http\Controllers;
use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show', 'stories'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //declaration of variable stories and get the stories from data base
        $stories = Story::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return view('stories.stories', ['stories' =>$stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail | required | min: 4',
            'detail' => 'bail | required | min: 10',
            'status' => 'bail | required',
        ]);
         // Get the currently authenticated user...
         $user = Auth::user();
         $status = array([0, 1]);
       Story::create([
           'title' =>$request->title,
           'detail' =>$request->detail,
           'status' =>$request->status,
           'user_id' => auth()->id()
       ]);
       session()->flash('message', 'your story has been successfully added');
       return redirect(route('stories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return view('stories.show', ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        $userId = Auth::id();
        if ($story->user_id !== $userId) {
            return redirect('/stories')->with('<div class="alert alert-danger">Sorry that it is not your article !! you can not edit it</div>');
        }
        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $story->title = $request->title;
        $story->detail = $request->detail;
        $userId = Auth::id();
        $status = array([0, 1]);
        
        if ($story->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your story !! you can not edit it');
            return redirect('/stories');
        }
        $story->save();
        session()->flash('message', 'your story has been successfully updated');
        return redirect(route('stories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        $userId = Auth::id();
        if ($story->user_id !== $userId) {
            session()->flash('message', 'Sorry that it is not your story !! you can not delete it');
            return redirect('/stories');
        }
        session()->flash('message', 'your story has been deleted');
        return redirect(route('stories.index'));

    }
    
}
