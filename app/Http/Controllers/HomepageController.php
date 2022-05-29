<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Models\Produk;
use App\Models\admin;
use App\Models\User;
use App\Models\courier;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\Chart;
use App\Models\Checkout;
use App\Models\DetailCheckout;
use App\Models\product_kategori_detail;
use App\Models\ProdukReview;
use App\Models\City;
use App\Models\Province;
use RajaOngkir;
use Illuminate\Support\Carbon;

class HomepageController extends Controller
{
    //homepage
    public function homepageuser(){
        return view('homepage/index');
    }

    //get homepage
    public function gethomepage(){
        $produk = Produk::all();
        $kategori = Kategori::all();
        $gambarproduk = ProdukImage::all();
        $kategoriproduk = product_kategori_detail::all();

        //dd($produk);
        return view('homepage/index', compact('produk', 'kategori', 'gambarproduk', 'kategoriproduk'));
    }

    //detail produk pgae
    public function detailproduk($id){
        $produk = Produk::all();
        $produk2= Produk::where('id', $id)->first();
        $comment = ProdukReview::where('id_produk', $id)->get();
        $star = ProdukReview::where('id_produk', $id)->avg('star');

        //dd($id);
        
        return view('homepage.detailproduk', compact('produk2', 'comment', 'star'));
    }

    //chart
    public function chartpage($id){
        $produk = Produk::all();
        $user = User::where('id', $id) -> first();
        $chart = Chart::where('id_user', $id)->get();
        $test = Chart::where('id_user', $id)->get();


        //dd($id);
        return view('homepage/chart', compact ('produk', 'user', 'test'));
    }

    //nambah ke chart
    public function addchart(Request $request, $id, $idd){
        $produk = Produk::all();
        $user = User::where('id', $id)->first();

        $chartmake = Chart::create([
            'id_produk' => $idd,
            'id_user' => $id
        ]);

        return redirect()->action([HomepageController::class,'chartpage'], ['id'=> $user->id]);
    }

    //delete all chart
    public function deletechart($id){
        $delete = Chart::where('id_user', $id)->get();
        $data = Chart::where('id_user', $id)->first();

        $delete->each->delete();

        //dd($id);
        return redirect()->action([HomepageController::class,'chartpage'], ['id'=> $data->id_user]);
        //return redirect('/paymentpage/{id}');
    }

    //checkout
    public function checkout($id){

        $checkout = Checkout::where('id', $id)->first();
        $kurir = courier::all();
        $provinces = Province::pluck('province', 'province_id');

        $propinsi = Province::where('province_id', '=', 1)->first();
        
        //dd($propinsi);
        

        return view('homepage/checkout2', compact ('kurir', 'provinces', 'propinsi', 'checkout'));
    }

    //checkout biasa
    public function checkoutbiasa($id){
        $date = Carbon::now('Asia/Makassar');
        $timeout = $date->addHours(24);
        $cha = Produk::where('id', $id)->first();

        $checkoutupload = Checkout::create([
            'id_user' => Auth::id(),
            'alamat' => NULL,
            'ongkir' => NULL,
            'total' => 0,
            'bukti_pembayaran' => NULL,
            'status' => 'waiting',
            'timeout' => $timeout
        ]);

        $detailcheckout = DetailCheckout::create([
            'id_checkout' => $checkoutupload->id,
            'id_produk' => $id,
            'qty' => 1,
            'harga_produk' => $cha->price
        ]);

           
        //+= NILAI HARGA DITAMBAH YANG BARU
        $total_harga = $cha->price;

        $checkoutupload->total = $total_harga;

        $checkoutupload->save();

        return redirect()->action([HomepageController::class,'checkout'], ['id'=> $checkoutupload->id]);
    }

    //checkout upload
    public function checkoutgas(Request $request, $id){
        $date = Carbon::now('Asia/Makassar');
        $timeout = $date->addHours(24);
        $checkout = Checkout::where('id', $id)->first();

        $checkout->alamat = $request->alamat;
        $checkout->ongkir = $request->ongkir;

        $checkout->total = $request->total;

        //KALO MAU MASUKIN DATA PROVINSI TUJUAN
        //$checkout->provinsi = $request->province_destination;

        $checkout->save();

        foreach($checkout->detailcheckoutkecheckout as $cek){
            
            //dd($chart);

            $produk = Produk::where('id', $cek->id_produk)->first();

            $produk->update([
                'stock' => $produk->stock-1
            ]);

        }

        //dd($timeout);
        return redirect()->action([HomepageController::class,'paymentpage'], ['id'=> Auth::user()->id]);
    }

    //CHART CHECKOUT ALL

    public function chartcheckout(Request $request, $id){
        $chart = Chart::where('id_user', $id)->get();
        $date = Carbon::now('Asia/Makassar');
        $total_harga = 0;
        $timeout = $date->addHours(24);

        if(isset($chart)){

            $checkoutupload = Checkout::create([
                'id_user' => Auth::id(),
                'alamat' => $request->alamat,
                'ongkir' => NULL,
                'total' => 0,
                'bukti_pembayaran' => NULL,
                'status' => 'waiting',
                'timeout' => $timeout
            ]);

            foreach($chart as $cha){
                //dd($chart);
                $detailcheckout = DetailCheckout::create([
                    'id_checkout' => $checkoutupload->id,
                    'id_produk' => $cha->id_produk,
                    'qty' => $cha->qty,
                    'harga_produk' => $cha->produkkeuser->price
                ]);

               
                //+= NILAI HARGA DITAMBAH YANG BARU
                $total_harga += $cha->produkkeuser->price;
                

            }
            
            $checkoutupload->total = $total_harga;

            $checkoutupload->save();

        }

        return redirect()->action([HomepageController::class,'checkout'], ['id'=> $checkoutupload->id]);
    }

    //payment page
    public function paymentpage($id){
        $payments = Checkout::where('id_user', $id)->get();
        //$detail = DetailCheckout::where('id_checkout', $id)->first();

        //dd($payments);
        return view('/homepage/prosestransaksi2', compact('payments'));
    }

    //upload payment
    public function uploadpayment(Request $request, $id, $idd){
        $user = User::where('id', $id)->first();
        //$uploadpayment = Checkout::where('id', $id)->first();
        $name = '';

        //photo
        if($request->hasFile('buktipembayaran')){
        $image = $request->file('buktipembayaran');
        $name = 'image_'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);
                   
        }

        $uploadpayment = Checkout::where('id', $idd)
        ->update([
            'bukti_pembayaran' => 'image/'.$name,
            'status' => "sudah_transfer"
        ]);

        //$uploadpayment->save();
        /*$uploadpayment = Checkout::update([
            'bukti_pembayaran' =>'image/'.$name
        ]);*/

        return redirect()->action([HomepageController::class,'paymentpage'], ['id'=> $user->id]);
        
    }

    //delete checkout
    public function deletecheckout($id, $idproduk){
        $delete = Checkout::where('id', $idproduk)->first();
        $check = User::where('id', $id)->first();

        $delete->delete();

        return redirect('dashboarduser');
        //return redirect('/paymentpage/{id}');
    }

    //upload comment di page payment
    public function uploadcomment(Request $request, $id, $idd){
        $user = User::where('id', Auth::user()->id)->first();

        $uploadcomment = ProdukReview::create([
            'id_user' => Auth::id(),
            'id_produk' => $idd,
            'star' => $request->rate,
            'content' => $request->comment
        ]);

        $produk = Checkout::where('id', $id)
        ->update([
            'status' => "reviewed"
        ]);

        //dd($user);


        return redirect()->action([HomepageController::class,'paymentpage'], ['id'=> Auth::user()->id]);
        //return redirect('/paymentpage/{id}');
    }

     //reply comment
     public function replycomment(Request $request, $id){
        $comment = ProductReview::where('id', $id)->first();

        $uploadcomment = ProdukReview::create([
            'id_user' => Auth::id(),
            'id_produk' => $id,
            'content' => $request->comment
        ]);

        return redirect()->action([HomepageController::class,'detailproduk'], ['id'=> $comment->id]);
        //return redirect('/paymentpage/{id}');
    }

    //upload review
    public function uploadreview(Request $request, $id, $idcekout){
        $comment = User::where('id', $id)->first();

        $uploadreview = ProdukReview::create([
            'id_user' => Auth::id(),
            'id_produk' => $id,
            'content' => $request->review
        ]);
        

        return redirect()->action([HomepageController::class,'paymentpage'], ['id'=> $comment->id]);
        //return redirect('/dashboarduser');
    }


    //RAJA ONGKIR
        /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $provinces = Province::pluck('province', 'province_id');


        return view('/homepage/ongkir', compact('provinces'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('city_name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

     
    public function check_ongkir(Request $request)
    {
        try {
            $params = ['origin'=>$request->city_origin,'destination'=>$request->city_destination,'weight'=>$request->weight,'courier' =>$request->courier];
            $get = RajaOngkir::find($params)->costDetails()->get();
            

                
    
            return response()->json($get);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
