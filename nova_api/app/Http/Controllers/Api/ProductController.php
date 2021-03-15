<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{   
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){

        return Product::orderBy('created_at', 'DESC')->get();
        // $products = $this->product->all();
        // return response()->json($products);
        
    }

    public function store(Request $request){
        $newProduct = new Product; 
        
        $newProduct->name = $request->product["name"];
        $newProduct->price = $request->product["price"];
        $newProduct->description = $request->product["description"];
        $newProduct->slug = $request->product["slug"];
        $newProduct->save();
        return $newProduct;
        
    }

    public function update(Request $request, $id){
        $existingItem = Product::find($id);

        if( $existingItem) {
            $existingItem->completed = $request->product["completed"] ? true : false;
            $existingItem->completed_at = $request->product["completed"] ? Carbon::now() : null;
            $existingItem->save();
            return $existingItem;
        }
        return "Item não encontrado!";
    }
    
    public function destroy($id){
        $existingItem = Product::find($id);
        
        if($existingItem){
            $existingItem->delete();
            return "Item deletado com sucesso!";
        }
        return "Item não encontrado!";
    }
}