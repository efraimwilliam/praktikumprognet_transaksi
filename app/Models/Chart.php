<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'Chart';
    protected $fillable = [
        'id_produk', 'id_user', 'qty', 'id_kategori',
    ];

    public function userkechart(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produkkeuser(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function produkimagekechart(){
        return $this->belongsTo(ProdukImage::class, 'id_produk');
    }

    
    public function produkkategori(){
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
