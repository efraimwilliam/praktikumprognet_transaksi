<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukImage;

class ImageController extends Controller
{
    public function index(Request $request) {
        $itemgambar = ProdukImage::where('id', $request->id)->paginate(20);
        $data = array('title' => 'Data Image',
                    'itemgambar' => $itemgambar);
        return view('image.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileupload = $request->file('image');
        $folder = 'public/images';
        $itemgambar = $this->upload($fileupload, $folder);

        return back()->with('success', 'Image berhasil diupload');
    }

    public function destroy(Request $request, $id) {
        $itemuser = $request->user();
        $itemgambar = ProdukImage::where('user_id', $itemuser->id)
                            ->where('id', $id)
                            ->first();
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data tidak ditemukan');
        }
    }
    
    public function upload($fileupload, $itemproduk, $folder) {
        dd($fileupload);
        $path = $fileupload->store('foto-produk');
        $inputangambar['image_name'] = $path;
        $inputangambar['product_id'] = $itemproduk->id;
        return ProdukImage::create($inputangambar);
    }
}