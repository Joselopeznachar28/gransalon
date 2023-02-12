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
        'totalToProduct',
        'concessionaire_id',
        'sale_id'
    ];

    public function concessionaire(){
        return $this->belongsTo(Concessionaire::class);
    }

    public function sale(){
        return $this->belongsTo(Sale::class);
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
