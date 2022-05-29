<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image_name',
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Produk','product_id');
    }
}