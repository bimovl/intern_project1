<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        
        $this->middleware(['auth', 'verified']);
    
    }
    public function index()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$data = Announcement::all();
    	return view('announcement.index',compact('data'));
        }else{
            return redirect('home');
        }
    }

    public function detail($id)
    {
        $data = Announcement::findorfail($id);
        return view ('announcement.detail', compact('data'));
    }


    public function add()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	return view('announcement.add');
        }else{
        return redirect('home');
        }
    }

    public function store(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$request->validate([
		 	'title'=>'required',
		 	'content'=>'required'
		 ]);

		 $announcement = new Announcement;
		 $announcement->title= $request->title;
		 $announcement->content= $request->content;
         $announcement->save();
        return redirect('announcement')->with('toast_success','Data Successfully Saved');
        }else{
        return redirect('home');
        }
    }

    public function edit($id,Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$data = Announcement::find($id);
    	return view('announcement.edit',compact('data'));
        }
        elseif($role=='0'){
        return redirect('home');
        }
    }

    public function update(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$request->validate([
		 	'title'=>'required',
		 	'content'=>'required'
		 ]);
    	
    	$announcement = Announcement::find($request->id);
    	$announcement->title = $request->title;
    	$announcement->content = $request->content;
        $announcement->save();
        return redirect('announcement')->with('toast_success','Data Successfully Updated');
        }else{
        return redirect('home');
        }
    }

    public function destroy($id)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
        $announcement = announcement::find($id);
        $announcement->delete();
        return back()->with('toast_success','Data Deleted');
        }else{
        return redirect('home');
        }
    }
}