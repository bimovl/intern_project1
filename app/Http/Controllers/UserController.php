<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
        
    }

    
    public function index()
    {
        $user= User::where('id', Auth::user()->id)->first();
        return view('users.index', compact('user'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit()
    {
        $user= User::where('id', Auth::user()->id)->first();
        return view('users.edit', compact('user'));
        // return view('users.edit')->with('user', auth()->user());
    }

   
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);
        $user= User::where('id', Auth::user()->id)->first();
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->phone=$request->phone;
        $user->instagram=$request->instagram;
        $user->github=$request->github;
        $user->twitter=$request->twitter;
        $user->status=$request->status;
        if(!empty($request->password))
        {
            $user->password=Hash::make($request->password);
        }
        $user->update();
        return redirect('user')->with('toast_success','Data Successfully Updated');
        
    }

    public function disable(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);
        $user= User::where('id', Auth::user()->id)->first();
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->instagram=$request->instagram;
        $user->github=$request->github;
        $user->twitter=$request->twitter;
        $user->status=$request->status;
        if(!empty($request->password))
        {
            $user->password=Hash::make($request->password);
        }
        $user->update();
        return redirect('logout')->with('error','Account Disabled');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
