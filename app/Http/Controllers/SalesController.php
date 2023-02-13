<?php

namespace App\Http\Controllers;

use App\Models\Concessionaire;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;
use PDF;

class SalesController extends Controller
{
    public function dashboard()
    {
        $credictSales = Sale::orWhere('sale_type', 'credito')->get();
        $paymentSales = Sale::orWhere('sale_type', 'paga')->get();

        return view('sales.dashboard', compact('credictSales', 'paymentSales'));
    }

    public function create()
    {
        $concessionaires = Concessionaire::all();
        $products = Product::all();
        return view('sales.create',compact('products','concessionaires'));
    }

    public function store(SaleRequest $request)
    {

        $sale = Sale::create([
            'code' => 0,
            'sale_type'     => $request->sale_type,
            'note'          => $request->note,
            'payment_type'  => $request->payment_type,
            'payment_form'  => $request->payment_form,
            'payment_code'  => $request->payment_code,
            'priceDollar'   => 24,20,
            'payment_total' => 0,
            'payment_vef'   => 0,
        ]);

        $payment_vef = 0;
        $hasProducts = $request->has('products');
        
        $products = $request->products;
        
        if ($hasProducts){
            
            foreach ($products as $product) {

                $totalToProduct = $product['price'] * $product['quantity'];

                $newProduct = $sale->products()->saveMany([

                    new Product([
                        'name'  => $product['name'],
                        'price' => $product['price'],
                        'quantity' => $product['quantity'],
                        'totalToProduct' => $totalToProduct,
                        'concessionaire_id' => $product['concessionaire_id'],
                        'sale_id' => $sale->id,
                    ]),
                ]);
            }
        }

        $payment_total = $sale->products->sum('totalToProduct');

        if ($sale->payment_type == 'vef') {
            $payment_vef = $payment_total * $sale->priceDollar;
        }

        $sale->update([
            'code' => strtoupper('VENTA-0' . $sale->id),
            'payment_total' => $payment_total,
            'payment_vef'   => $payment_vef,
        ]);
        

        return redirect()->route('sales.dashboard');
    }

    public function pdfSales()
    {

        $credictSales = Sale::orWhere('sale_type', 'credito')->get();
        $paymentSales = Sale::orWhere('sale_type', 'paga')->get();

        $pdf = PDF::loadView('sales.pdf', compact('credictSales', 'paymentSales'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }

    public function show($id){

        $sale = Sale::find($id);
        return view('sales.show', compact('sale'));
    }
}
