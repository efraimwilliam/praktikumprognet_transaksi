<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'product_categories';
    protected $fillable = [
        'category_name',
    ];

    public function produkkekategori(){
        return $this->hasMany(Produk::class, 'id_kategori');
    }

    public function chartkekategori(){
        return $this->belongsTo(Chart::class, 'id_kategori');
    }

    public function checkoutkekategori(){
        return $this->belongsTo(Checkout::class, 'id_kategori');
    }

    
}