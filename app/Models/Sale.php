<?php

namespace App\Models;

use Attribute;
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
        'payment_vef',
        'priceDollar',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function productSales(){
        return $this->hasMany(ProductSale::class);
    }

    public function setPriceDollarAttribute($value)
    {
        $this->attributes['priceDollar'] = $value * 100;
    }
    
    public function getPriceDollarAttribute($value)
    {
        return $value / 100;
    }

    public function setPaymentTotalAttribute($value)
    {
        $this->attributes['payment_total'] = $value * 100;
    }
    
    public function getPaymentTotalAttribute($value)
    {
        return $value / 100;
    }

    public function setPaymentVefAttribute($value)
    {
        $this->attributes['payment_vef'] = $value * 100;
    }
    
    public function getPaymentVefAttribute($value)
    {
        return $value / 100;
    }
}
