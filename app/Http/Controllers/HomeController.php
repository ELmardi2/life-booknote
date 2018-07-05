<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $user = User::find($userId);
        $articles = $user->articles;
        $stories = $user->stories;
        $notes = $user->notes;
        return view('home', compact('articles', 'stories', 'notes', 'users', 'videos'));
    }
}
