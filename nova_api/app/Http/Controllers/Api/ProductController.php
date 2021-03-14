<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){
        $products = $this->product->all();
        return response()->json($products);
    }
}