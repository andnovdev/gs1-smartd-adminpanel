<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    // welcome page
    public function welcome()
    {
        // returning view
        return view('welcome');
    }
    // about page
    public function about()
    {
        // returning view
        return view('about');
    }
    // feature page
    public function feature()
    {
        return view('feature');
    }
    // program page
    public function program()
    {
        return view('program');
    }
}
