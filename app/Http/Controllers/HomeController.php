<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\DetailCheckout;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexadmin()
    {
        return view('homeadmin');
    }

    //checkout page
    public function checkout(){
        $checkout = Checkout::all();

        $detailcekout = DetailCheckout::all();

        return view('/admin/checkout', compact('checkout', 'detailcekout'));
    }

    //ganti status
    public function waiting($id){
        $data = Checkout::where('id', $id)
        ->update([
            'status' => "waiting"
        ]);
        return redirect('/admin/checkout');
    }

    //ganti status
    public function valid($id){
        $data = Checkout::where('id', $id)
        ->update([
            'status' => "valid"
        ]);

        //dd($id);
        
        return redirect('/admin/checkout');
    }

    //ganti status
    public function expired($id){
        $data = Checkout::where('id', $id)
        ->update([
            'status' => "expired"
        ]);
        return redirect('/admin/checkout');
    }

    //ganti status
    public function pengiriman($id){
        $data = Checkout::where('id', $id)
        ->update([
            'status' => "dalam_pengiriman"
        ]);
        return redirect('/admin/checkout');
    }

    //ganti status
    public function sampaitujuan($id){
        $data = Checkout::where('id', $id)
        ->update([
            'status' => "sampai_tujuan"
        ]);
        return redirect('/admin/checkout');
    }
    
}
