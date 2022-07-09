<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Linkaccess;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $announcement = Announcement::all();
            $user= User::where('id', Auth::user()->id)->first();
            return view('adminhome', compact('announcement', 'user'));
        }else if($role=='0'){
        $announcement = Announcement::all();
        $linkaccess = Linkaccess::all();
        $user= User::where('id', Auth::user()->id)->first();
        return view('home', compact('announcement', 'user', 'linkaccess'));
        }
    }
}

