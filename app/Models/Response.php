<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'response';
    protected $fillable = [
        'id_review', 'id_admin', 'content',
    ];

    public function reviewkerespon(){
        return $this->hasMany(ProdukReview::class, 'id_review');
    }
}
