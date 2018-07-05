<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class PagesController extends Controller
{
    public function Home()
    {
       return view('main');
    }
    public function About()
    {
       return view('/about');
    }
    public function Contact()
    {
       return view('/contact');
    }

    
}
