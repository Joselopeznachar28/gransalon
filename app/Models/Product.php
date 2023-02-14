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
        'concessionaire_id',
    ];

    public function concessionaire(){
        return $this->belongsTo(Concessionaire::class);
    }

    public function productSale(){
        return $this->hasOne(productSale::class);
    }

    public function setTotalToProductAttribute($value)
    {
        $this->attributes['totalToProduct'] = $value * 100;
    }
    
    public function getTotalToProductAttribute($value)
    {
        return $value / 100;
    }
}
