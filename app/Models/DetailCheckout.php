<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCheckout extends Model
{
    use HasFactory;

    protected $table = 'detail_checkouts';
    protected $fillable = [
        'id_checkout', 'id_produk', 'qty', 'diskon', 'harga_produk'
    ];

    public function transaksikedetailcheckout(){
        return $this->belongsTo(Checkout::class, 'id_checkout');
    }

    public function produkkedetailcheckout(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    
}
