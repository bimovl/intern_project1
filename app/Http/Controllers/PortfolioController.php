<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use App\Models\Portfolio;
use App\Models\Cv;
use App\Models\Otherdoc;

class PortfolioController extends Controller
{
    public function __construct()
    {
        
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $user= User::where('id', Auth::user()->id)->get();
        $otherdoc= Otherdoc::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
        $portfolio= Portfolio::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
        $cv= Cv::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
        return view('portfolio.index', compact('user', 'cv', 'portfolio', 'otherdoc'));
        }else{
        return redirect('home');
        }
    }

    public function storeportfolio(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $request->validate([
            'portfolio' => 'required'
        ]);

        $portfolio=new Portfolio();
        $file=$request->portfolio;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->portfolio->move('assets/portfolio',$filename);
        $portfolio->portfolio=$filename;
        $portfolio->user_id=$request->user_id;
        $portfolio->save();
        return redirect('portfolio')->with('toast_success','Data Successfully Save');
    }else{
        return redirect('home');
        }
    }

    public function storecv(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $request->validate([
            'cv' => 'required'
        ]);
       
        $cv=new Cv();
        $file=$request->cv;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->cv->move('assets/cv',$filename);
        $cv->cv=$filename;
        $cv->user_id=$request->user_id;
        $cv->save();
        return redirect('portfolio')->with('toast_success','Data Successfully Save');
        }else{
        return redirect('home');
        }
    }

    public function storeotherdoc(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $request->validate([
            'otherdoc' => 'required'
        ]);

        $otherdoc=new Otherdoc();
        $file=$request->otherdoc;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->otherdoc->move('assets/documents',$filename);
        $otherdoc->otherdoc=$filename;
        $otherdoc->user_id=$request->user_id;
        $otherdoc->save();
        return redirect('portfolio')->with('toast_success','Data Successfully Save');
        }else{
        return redirect('home');
        }
    }
    // public function update(Request $request)
	// {
	// 	$request->validate([
	// 		'user_id' => 'required',
    //         'cv' => 'required',
    //         'portfolio' => 'required',
    //         'other' => 'required',
	// 	]);

    //     try{
    //         $portfolio = Portfolio::create([
    //             'user_id' => $request->user_id,
    //             'cv' => $request->file('cv')->store('cvs'),
    //             'portfolio' => $request->file('portfolio')->store('portfolios'),
    //             'other' =>$request->file('other')->store('others'),
    //         ]);
    //     }catch(\Exception $portfolio)
    //     {
    //         $portfolio = portfolio::find($request->id);
	// 	    $portfolio->user_id = $request->user_id;
	// 	    $portfolio->cv = $request->file('cv')->store('cvs');
	// 	    $portfolio->portfolio = $request->file('portfolio')->store('portfolios');
	// 	    $portfolio->other = $request->file('other')->store('others');
    //     }

	// 	$portfolio->save();
    //     return redirect('portfolio')->with('status','Data Berhasil Disimpan');
	// }
}
