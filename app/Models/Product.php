<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'concessionaire_id',
        'sale_id'
    ];

    public function concessionaire(){
        return $this->belongsTo(Concessionaire::class);
    }

    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}
