<?php

namespace App\Http\Controllers;

use App\Models\Concessionaire;
use Illuminate\Http\Request;

class ConcessionairesController extends Controller
{
    public function create(){
        return view('concessionaires.create');
    }

    public function store(Request $request){
        $concessionaire = Concessionaire::create([
            'name' => $request->name,
        ]);

        return view('concessionaires.create');
    }

}
