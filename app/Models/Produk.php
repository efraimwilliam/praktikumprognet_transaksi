<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'produk_name',
        'price',
        'description',
        'product_rate',
        'stock',
        'weight',
        'foto',
    ];

    public function images() {
        return $this->hasMany(ProdukImage::class, 'product_id');
    }
    public function kategorikeproduk(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function chartkeproduk(){
        return $this->belongsTo(Chart::class, 'id_produk');
    }

    public function checkoutkeproduk(){
        return $this->belongsTo(Checkout::class, 'id_produk');
    }

    public function produkimagekeproduk(){
        return $this->hasOne(ProdukImage::class, 'product_id');
    }

    public function detailcheckoutkeproduk() {
        return $this->hasMany(DetailCheckout::class, 'id_produk');
    }
}