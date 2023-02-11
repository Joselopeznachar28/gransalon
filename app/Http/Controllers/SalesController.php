<?php

namespace App\Http\Controllers;

use App\Models\Concessionaire;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SalesController extends Controller
{

    public function create(){
        $concessionaires = Concessionaire::all();
        $products = Product::all();
        return view('sales.create',compact('products','concessionaires'));
    }

    public function store(Request $request){
        $sale = Sale::create([
            'code' => strtoupper('VENTA-' . (string) Str::random(5)),
            'sale_type'     => $request->sale_type,
            'note'          => $request->note,
            'payment_type'  => $request->payment_type,
            'payment_form'  => $request->payment_form,
            'payment_code'  => $request->payment_code,
            'priceDollar'   => $request->priceDollar,
            'payment_total' => 0,
        ]);
        
        $hasProducts = $request->has('products');
        
        $products = $request->products;
        
        if ($hasProducts){
            
            foreach ($products as $product) {
                
                $newProduct = $sale->products()->saveMany([
                    new Product([
                        'name'  => $product['name'],
                        'price' => $product['price'],
                        'quantity' => $product['quantity'],
                        'concessionaire_id' => $product['concessionaire_id'],
                        'sale_id' => $sale->id,
                    ]),
                ]);
            }
        }

        $payment_total = 0;
        $sale->update([
            'payment_total' => $payment_total,
        ]);

        // $saleProducts = $sale->products()->saveMany([
        //     new Product([
        //         ''
        //     ])
        // ])
    }
}
