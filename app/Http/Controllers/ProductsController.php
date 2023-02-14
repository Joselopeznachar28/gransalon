<?php

namespace App\Http\Controllers;

use App\Models\Concessionaire;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create(){
        $concessionaires = Concessionaire::all();
        return view('products.create', compact('concessionaires'));
    }

    public function store(Request $request){

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'concessionaire_id' => $request->concessionaire_id,
        ]);

        return redirect()->route('products.create');
    }

}
