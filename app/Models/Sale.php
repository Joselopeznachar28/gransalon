<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'sale_type',
        'note',
        'payment_type',
        'payment_form',
        'payment_code',
        'payment_total',
        'priceDollar',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
