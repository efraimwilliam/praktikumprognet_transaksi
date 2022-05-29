<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';
    protected $fillable = [
        'id_user', 'id_detail', 'alamat', 'ongkir', 'total', 'bukti_pembayaran', 'status' , 'timeout'
    ];

    public function userkecheckout(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produkkecheckout(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function produkimagekecheckout(){
        return $this->belongsTo(ProdukImage::class, 'id_produk');
    }

    public function kategorikecheckout(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function courireskecheckout(){
        return $this->belongsTo(User::class, 'id_couriers');
    }

    public function detailcheckoutkecheckout(){
        return $this->hasMany(DetailCheckout::class, 'id_checkout');
    }
}
