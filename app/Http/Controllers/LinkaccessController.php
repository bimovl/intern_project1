<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Linkaccess;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LinkaccessController extends Controller
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
    	$data = Linkaccess::all();
    	return view('linkaccess.index',compact('data'));
        }else{
            return redirect('home');
        }
    }


    public function add()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	return view('linkaccess.add');
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
		 	'link'=>'required'
		 ]);

		 $linkaccess = new Linkaccess;
		 $linkaccess->title= $request->title;
		 $linkaccess->link= $request->link;
         $linkaccess->save();
        return redirect('linkaccess')->with('toast_success','Data Successfully Save');
        }else{
        return redirect('home');
        }
    }

    public function edit($id,Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$data = Linkaccess::find($id);
    	return view('linkaccess.edit',compact('data'));
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
		 	'link'=>'required'
		 ]);
    	
    	$linkaccess = Linkaccess::find($request->id);
    	$linkaccess->title = $request->title;
    	$linkaccess->link = $request->link;
        $linkaccess->save();
        return redirect('linkaccess')->with('toast_success','Data Successfully Updated');
        }else{
        return redirect('home');
        }
    }

    public function destroy($id)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
        $linkaccess = Linkaccess::find($id);
        $linkaccess->delete();
        return back()->with('toast_success','Data Deleted');
        }else{
        return redirect('home');
        }
    }
}