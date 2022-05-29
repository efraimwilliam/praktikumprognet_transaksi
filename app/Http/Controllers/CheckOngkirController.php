<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use RajaOngkir;

class CheckOngkirController extends Controller
{
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
