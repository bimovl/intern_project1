<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Balancecash;
use App\Models\Balancersu;
use App\Models\User;
use DB;
class BalanceController extends Controller
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
    public function index()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $user= User::where('id', Auth::user()->id)->get();
        $cash=Balancecash::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
        $rsu=Balancersu::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
        return view('balance.user.index', compact('user', 'cash', 'rsu'));
        }else{
            return redirect('home');
        }
    }

    public function cashdetail()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $user= User::where('id', Auth::user()->id)->get();
        $cash=Balancecash::where('user_id', Auth::user()->id)->latest('created_at')->get();
        return view('balance.user.cashdetail', compact('user', 'cash'));
        }else{
        return redirect('home');
        }
    }

    public function rsudetail()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
        $user= User::where('id', Auth::user()->id)->get();
        $rsu=Balancersu::where('user_id', Auth::user()->id)->latest('created_at')->get();
        return view('balance.user.rsudetail', compact('user', 'rsu'));
        return redirect('home');
        }
    }

    public function indexcash()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
        // $cash=Balancecash::distinct('user_id')->with('user')
        $cash=Balancecash::with('user')
        ->latest('created_at')
        ->get();
        // return dd($cash);
        return view('balance.admin.indexcash', compact('cash'));
        }else{
            return redirect('home');
        }
    }

    public function indexrsu()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
        // $cash=Balancecash::distinct('user_id')->with('user')
        $rsu=Balancersu::with('user')
        ->latest('created_at')
        ->get();
        // return dd($cash);
        return view('balance.admin.indexrsu', compact('rsu'));
        }else{
            return redirect('home');
        }
    }

    public function addcash()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->where('hascash', 'N')->get();
            return view('balance.admin.addcash', compact('user'));
        }else{
            return redirect('home');
        }
    }

    public function addrsu()
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->where('hasrsu', 'N')->get();
            return view('balance.admin.addrsu', compact('user'));
        }else{
            return redirect('home');
        }
    }
    public function depositcash($id, Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->get();
            $cash = Balancecash::find($id);
            return view('balance.admin.depositcash', compact('user', 'cash'));
        }else{
            return redirect('home');
        }
    }

    public function depositrsu($id, Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->get();
            $rsu = Balancersu::find($id);
            return view('balance.admin.depositrsu', compact('user', 'rsu'));
        }else{
            return redirect('home');
        }
    }



    public function usertransfer()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            $user = User::where('role', '=', 0)->where('hascash', 'Y')->where('id', '!=', Auth::user()->id)->get();
            $cash=Balancecash::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
            return view('balance.user.usertransfer', compact('user', 'cash'));
        }else{
            return redirect('home');
        }
    }

    public function usertransferrsu()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            $user = User::where('role', '=', 0)->where('hasrsu', 'Y')->where('id', '!=', Auth::user()->id)->get();
            $rsu=Balancersu::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
            return view('balance.user.usertransferrsu', compact('user', 'rsu'));
        }else{
            return redirect('home');
        }
    }

    public function userwithdraw()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            $user = User::where('role', '=', 0)->get();
            $cash=Balancecash::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
            return view('balance.user.userwithdraw', compact('user', 'cash'));
        }else{
            return redirect('home');
        }
    }

    public function userwithdrawrsu()
    {
        $role=Auth::user()->role;
        if($role=='0')
        {
            $user = User::where('role', '=', 0)->get();
            $rsu=Balancersu::where('user_id', Auth::user()->id)->latest('created_at')->take(1)->get();
            return view('balance.user.userwithdrawrsu', compact('user', 'rsu'));
        }else{
            return redirect('home');
        }
    }

    public function withdrawcash($id, Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->get();
            $cash = Balancecash::find($id);
            return view('balance.admin.withdrawcash', compact('user', 'cash'));
        }else{
            return redirect('home');
        }
    }

    public function withdrawrsu($id, Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $user = User::where('role', '=', 0)->get();
            $rsu = Balancersu::find($id);
            return view('balance.admin.withdrawrsu', compact('user', 'rsu'));
        }else{
            return redirect('home');
        }
    }

    public function storecash(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $request->validate([
                'user_id' => 'required',
                'saldo_awal' => 'required',
                'transaksi' => 'required',
                'jumlah_transaksi' => 'required',
                'saldo_akhir' => 'required',
                'status' => 'required',
            ]);
            $cash = new Balancecash;
                $cash->user_id = $request->user_id;
                $cash->saldo_awal = $request->saldo_awal;
                $cash->transaksi = $request->transaksi;
                $cash->jumlah_transaksi = $request->jumlah_transaksi;
                $cash->saldo_akhir = $request->saldo_akhir;
                $cash->penerima = $request->penerima;
                $cash->status = $request->status;

            if ($cash->saldo_akhir < 0){
                return back()->with('toast_error','Failed Transaction (Insufficient Balance)');
            }
            else if ($cash->save()){
            DB::table('users')->where('id', $request->user_id)->update(['hascash'=>'Y']);
            return redirect('balance/indexcash')->with('toast_success','Transaction Succeeded');
            }
        }else if($role=='0')
        {
            $request->validate([
                'user_id' => 'required',
                'saldo_awal' => 'required',
                'transaksi' => 'required',
                'jumlah_transaksi' => 'required',
                'saldo_akhir' => 'required',
                'status' => 'required',
            ]);
            $cash = new Balancecash;
                $cash->user_id = $request->user_id;
                $cash->saldo_awal = $request->saldo_awal;
                $cash->transaksi = $request->transaksi;
                $cash->jumlah_transaksi = $request->jumlah_transaksi;
                $cash->saldo_akhir = $request->saldo_akhir;
                $cash->penerima = $request->penerima;
                $cash->status = $request->status;
            if ($cash->saldo_akhir < 0){
                return back()->with('toast_error','Failed Transaction (Insufficient Balance)');
            }
            else if($cash->save())
            {
            DB::table('users')->where('id', $request->user_id)->update(['hascash'=>'Y']);
            if($cash->transaksi = 'transfer')
            {
                $saldo_akhir=Balancecash::where('user_id', $request->penerima)->latest('created_at')->take(1)->get();

                foreach ($saldo_akhir as $key => $value) {
                    Balancecash::create([
                        'user_id'=> $request->penerima,
                        'saldo_awal'=> $value->saldo_akhir,
                        'jumlah_transaksi'=> $request->jumlah_transaksi,
                        'transaksi'=> 'recieve',
                        'status'=> $request->status,
                        'saldo_akhir'=> $value->saldo_akhir + $request->jumlah_transaksi,
                        'pengirim'=> $request->user_id,
                    ]);
                }
            }
            return redirect('balance')->with('toast_success','Transaction Succeeded!');
            }
        }
    }

    public function storersu(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
            $request->validate([
                'user_id' => 'required',
                'saldo_awal' => 'required',
                'transaksi' => 'required',
                'jumlah_transaksi' => 'required',
                'saldo_akhir' => 'required',
                'status' => 'required',
            ]);
            $rsu = new Balancersu;
                $rsu->user_id = $request->user_id;
                $rsu->saldo_awal = $request->saldo_awal;
                $rsu->transaksi = $request->transaksi;
                $rsu->jumlah_transaksi = $request->jumlah_transaksi;
                $rsu->saldo_akhir = $request->saldo_akhir;
                $rsu->penerima = $request->penerima;
                $rsu->status = $request->status;
                if ($rsu->saldo_akhir < 0){
                    return back()->with('error','Failed Transaction (Insufficient Balance)');
                }
                else if ($rsu->save()){
                DB::table('users')->where('id', $request->user_id)->update(['hasrsu'=>'Y']);
                return redirect('balance/indexrsu')->with('toast_success','Transaction Succeeded!');
                }
        }else if($role=='0')
        {
            $request->validate([
                'user_id' => 'required',
                'saldo_awal' => 'required',
                'transaksi' => 'required',
                'jumlah_transaksi' => 'required',
                'saldo_akhir' => 'required',
                'status' => 'required',
            ]);
            $rsu = new Balancersu;
                $rsu->user_id = $request->user_id;
                $rsu->saldo_awal = $request->saldo_awal;
                $rsu->transaksi = $request->transaksi;
                $rsu->jumlah_transaksi = $request->jumlah_transaksi;
                $rsu->saldo_akhir = $request->saldo_akhir;
                $rsu->penerima = $request->penerima;
                $rsu->status = $request->status;
                if ($rsu->saldo_akhir < 0){
                    return back()->with('error','Failed Transaction (Insufficient Balance)');
                }
                else if($rsu->save())
                {
                DB::table('users')->where('id', $request->user_id)->update(['hasrsu'=>'Y']);
                if($rsu->transaksi = 'transfer')
                {
                    $saldo_akhir=Balancecash::where('user_id', $request->penerima)->latest('created_at')->take(1)->get();
    
                    foreach ($saldo_akhir as $key => $value) {
                        Balancecash::create([
                            'user_id'=> $request->penerima,
                            'saldo_awal'=> $value->saldo_akhir,
                            'jumlah_transaksi'=> $request->jumlah_transaksi,
                            'transaksi'=> 'recieve',
                            'status'=> $request->status,
                            'saldo_akhir'=> $value->saldo_akhir + $request->jumlah_transaksi,
                            'pengirim'=> $request->user_id,
                        ]);
                    }
                }
            return redirect('balance')->with('toast_success','Transaction Succeeded');
            }
        }
    }
    public function updatewithdrawcash(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$request->validate([
            'user_id' => 'required',
            'saldo_awal' => 'required',
            'transaksi' => 'required',
            'jumlah_transaksi' => 'required',
            'saldo_akhir' => 'required',
            'status' => 'required',
		 ]);
    	
    	$cash = Balancecash::find($request->id);
    	$cash->user_id = $request->user_id;
        $cash->saldo_awal = $request->saldo_awal;
        $cash->transaksi = $request->transaksi;
        $cash->jumlah_transaksi = $request->jumlah_transaksi;
        $cash->saldo_akhir = $request->saldo_akhir;
        $cash->penerima = $request->penerima;
        $cash->status = $request->status;
        $cash->save();
        return redirect('balance/indexcash')->with('toast_success','Transaction Succeeded');
        }else
        {
        return redirect('home');
        }
    }

    public function updatewithdrawrsu(Request $request)
    {
        $role=Auth::user()->role;
        if($role=='1')
        {
    	$request->validate([
            'user_id' => 'required',
            'saldo_awal' => 'required',
            'transaksi' => 'required',
            'jumlah_transaksi' => 'required',
            'saldo_akhir' => 'required',
            'status' => 'required',
		 ]);
    	
    	$rsu = Balancersu::find($request->id);
    	$rsu->user_id = $request->user_id;
        $rsu->saldo_awal = $request->saldo_awal;
        $rsu->transaksi = $request->transaksi;
        $rsu->jumlah_transaksi = $request->jumlah_transaksi;
        $rsu->saldo_akhir = $request->saldo_akhir;
        $rsu->penerima = $request->penerima;
        $rsu->status = $request->status;
        $rsu->save();
        return redirect('balance/indexrsu')->with('toast_success','Transaction Succeeded');
        }else
        {
        return redirect('home');
        }
    }
}