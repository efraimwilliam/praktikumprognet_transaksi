<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\product_kategori_detail;
use App\Models\ProdukReview;
use App\Models\Response;
use App\Models\admin;
use Auth;

use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $review = ProdukReview::all();
        $itemimage = ProdukImage::orderBy('created_at', 'desc')->count();;
        $item = Produk::leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('products.id','product_images.id as id_image', 'products.produk_name','products.price','products.description','products.product_rate','products.stock','products.weight', 'product_images.image_name')
        ->paginate(20);
        $data = array('title' => 'Produk',
                    'review' => $review,
                    'itemproduk' => $itemproduk,
                    'itemimage' => $itemimage,
                    'item' => $item);
        return view('produk.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemkategori = Kategori::orderBy('category_name', 'asc')->get();
        $data = array('title' => 'Form Produk Baru',
                    'itemkategori' => $itemkategori);
        return view('produk.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'produk_name' => 'required',
            'description' => 'required',
            'product_rate' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $inputan = $request->all();
        $itemproduk = Produk::create($inputan);
        return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $data = array('title' => 'Foto Produk',
                'itemproduk' => $itemproduk);
        
        $review = ProdukReview::where('id_produk', $id)->get();
        return view('produk.show', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemproduk = Produk::where('id',$id)->first();
        $data = array('title' => 'Form Edit Produk',
                'itemproduk' => $itemproduk);
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'produk_name' => 'required',
            'description' => 'required',
            'product_rate' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
        $itemproduk = Produk::findOrFail($id);
            $inputan = $request->all();
            $itemproduk->update($inputan);
            return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
        }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadimage(Request $request, $id) {
       // $uploadimage= ProdukImage::where('product_id', $id)->first();
        $name = '';

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = 'images_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
           
        }

        $uploadimage = ProdukImage::where('product_id', $id)
        ->update([
            'image_name' => 'images/'.$name
        ]);

         return back()->with('success', 'Image berhasil diupload');
    }

    public function deleteimage(Request $request, $id) {
        $itemprodukimage = ProdukImage::findOrFail($id);
        $itemgambar = \App\Models\ProdukImage::where('image_name', $itemprodukimage->foto)->first();
        if ($itemgambar) {
            \Storage::delete($itemgambar->image_name);
            $itemgambar->delete();
        }
        $itemprodukimage->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function destroy($id)
    {
        $itemproduk = Produk::findOrFail($id); 
        if (product_kategori_detail::where('product_id',$id)->exists()) {
            return back()->with('error', 'Hapus Detail Yang Menggunakan Produk Ini Dahulu !!');
        }elseif (ProdukImage::where('product_id',$id)->exists()) {
            return back()->with('error', 'Hapus Gambar Produk Ini Dahulu !!');  
        }
        else{
            if ($itemproduk->delete()) {
                return back()->with('success', 'Data berhasil dihapus');
            } else {
                return back()->with('error', 'Data gagal dihapus');
            }
        }
    }
    //comment page admin
    public function comment($id){
        $produk = Produk::all();
        $produk2= Produk::where('id', $id)->first();
        $comment = ProdukReview::where('id_produk', $id)->get();
        $review = Response::all();

        return view('/produk/comment', compact('produk2', 'comment'));
    }

    //reply comment
     public function replycomment(Request $request, $id, $idbarang){
        $review = Produk::where('id', $idbarang)->first();

        $uploadcomment = Response::create([
            'id_review' => $id,
            'id_admin' => Auth::id(),
            'content' => $request->review
        ]);

        //dd($id);

        return redirect()->action([ProdukController::class,'comment'], ['id'=> $review->id]);
    }
    
}