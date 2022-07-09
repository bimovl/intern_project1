<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cv;
use App\Models\Portfolio;
use App\Models\Otherdoc;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UploadController extends Controller
{

    function uploadcv(Request $request)
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
        $result=$cv->save();
        if($result){
            Alert::success('Success', 'Data Successfully Save');
            return redirect()->back();
        }else{
            return ["result"=>"cv not uploaded"];
        }
        
    }

    function uploadportfolio(Request $request)
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
        $result=$portfolio->save();
        if($result){
            Alert::success('Success', 'Data Successfully Save');
            return redirect()->back();
        }else{
            return ["result"=>"cv not uploaded"];
        }
        
    }

    function uploaddocument(Request $request)
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
        $result=$otherdoc->save();
        if($result){
            Alert::success('Success', 'Data Successfully Save');
            return redirect()->back();
        }else{
            return ["result"=>"cv not uploaded"];
        }
        
    }
}