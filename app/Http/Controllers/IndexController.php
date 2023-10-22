<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $product = Product::select('id', 'product_name', 'product_price', 'product_image', 'product_price')->inRandomOrder()->paginate(12);
        return view('index', ['products' => $product]);
    }
}
