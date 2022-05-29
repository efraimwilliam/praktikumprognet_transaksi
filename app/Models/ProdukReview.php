<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukReview extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';
    protected $fillable = [
        'id_user', 'id_produk', 'star', 'content',
    ];

    public function userkereview() {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function produkkereview(){
        return $this->belongsTo(Produk::class, 'id_kategori');
    }

    public function responkereview(){
        return $this->hasMany(Response::class, 'id_review');
    }
}
