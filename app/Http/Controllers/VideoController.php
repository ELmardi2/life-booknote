<?php

namespace App\Http\Controllers;

use App\Video;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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
    public function index()
    {
        $videos = Video::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        return view('videos.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.add');
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
            'file' => 'bail | required ',
            'status' => 'bail | required',
        ]);
         // Get the currently authenticated user...
         $user = Auth::user();
         $status = array([0, 1]);
         $request->file('thumbnail')->move(public_path('videos'), $request->file('thumbnail')->getClientOriginalName());

    $video->thumbnail = public_path('upload') . '/' .
     $request->file('thumbnail')->user_id -> auth()->id();
  
    $video->save();
    /*
       video::create([
           'title' =>$request->title,
           'video' =>$request->video,
           'status' =>$request->status,
           'user_id' => auth()->id()
       ]); */
       session()->flash('message', 'your story has been successfully added');
       return redirect(route('videos.index'));
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('videos.show', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
