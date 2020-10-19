<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Tweet;
class TweetsController extends Controller
{
    
      public function index()
    {
       // $tweet = Tweet::latest()->gets();

        return view('home',['tweets' => auth()->user()->timeline()]);
    }
    
    
    public function store(){
       $attributes =  request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);
        return redirect()->route('home');
    }
    
    
}
