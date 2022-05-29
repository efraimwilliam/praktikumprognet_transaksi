<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\courier;


class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemcourier = courier::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Courier',
                    'itemcourier' => $itemcourier);
        return view('courier.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemcourier = courier::orderBy('courier', 'asc')->get();
        $data = array('title' => 'Courier',
                    'itemcourier' => $itemcourier);
        return view('courier.create', $data);
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
            'courier' => 'required',
        ]);

        $inputan = $request->all();
        $itemcourier = courier::create($inputan);
        return redirect()->route('courier.index')->with('success', 'Data berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemcourier = courier::findOrFail($id);
        $data = array('title' => 'Courier',
                    'itemcourier' => $itemcourier);
        return view('courier.show', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemcourier = courier::where('id',$id)->first();
        $data = array('title' => 'Form Edit Courier',
                    'itemcourier' => $itemcourier);
        return view('courier.edit', $data);
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
            'courier' => 'required',
        ]);
        $itemcourier = courier::findOrFail($id);
            $inputan = $request->all();
            $itemcourier->update($inputan);
            return redirect()->route('courier.index')->with('success', 'Data berhasil diupdate');
        }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemcourier = courier::findOrFail($id); 
        if ($itemcourier->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
    
}