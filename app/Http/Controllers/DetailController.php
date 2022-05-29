<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\product_kategori_detail;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemdetail = product_kategori_detail::orderBy('created_at', 'desc')->paginate(20);
        $itemkategori = Kategori::orderBy('created_at', 'desc')->paginate(20);
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $shares = DB::table('product_kategori_details')
            ->join('products', 'product_kategori_details.product_id', '=', 'products.id')
            ->join('product_categories', 'product_kategori_details.category_id', '=', 'product_categories.id')
            ->get();
        $data = array('title' => 'Detail Kategori',
                    'itemdetail' => $itemdetail,
                    'itemkategori' => $itemkategori,
                    'itemproduk' => $itemproduk,
                    'itemshare' => $shares
                );
        return view('detail.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemdetail = product_kategori_detail::orderBy('id', 'asc')->get();
        $itemkategori = Kategori::orderBy('created_at', 'desc')->paginate(20);
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Form Detail',
        'itemdetail' => $itemdetail,
        'itemkategori' => $itemkategori,
        'itemproduk' => $itemproduk);
        return view('detail.create', $data);
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
            'product_id' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        $inputan = $request->all();
        $itemdetail = product_kategori_detail::create($inputan);
        return redirect()->route('detail.index')->with('success', 'Data berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemdetail = product_kategori_detail::findOrFail($id);
        $data = array('title' => 'Foto Produk',
                'itemdetail' => $itemdetail);
        return view('detail.show', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemdetail = product_kategori_detail::where('id',$id)->first();
        $itemkategori = Kategori::orderBy('created_at', 'desc')->paginate(20);
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $namakategori = DB::table('product_kategori_details')
        ->join('products', 'product_kategori_details.product_id', '=', 'products.id')
        ->join('product_categories', 'product_kategori_details.category_id', '=', 'product_categories.id')
        ->where('product_kategori_details.id',$id)
        ->get();
        $data = array('title' => 'Form Edit Produk',
                'itemdetail' => $itemdetail,
                'itemkategori' => $itemkategori,
                'itemproduk' => $itemproduk,
                'namakategori' => $namakategori
            );
        return view('detail.edit', $data);
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
            'product_id' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        $itemdetail = product_kategori_detail::findOrFail($id);
            $inputan = $request->all();
            $itemdetail->update($inputan);
            return redirect()->route('detail.index')->with('success', 'Data berhasil diupdate');
        }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = product_kategori_detail::findOrFail($id); 
        if ($itemdetail->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
    
}