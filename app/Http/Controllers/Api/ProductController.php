<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = Product::latest()->get();
        return response()->json([ProductResource::collection($data), 'contacts fetched.']);
   
    }
    public function show($id){
         
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new ProductResource($product)]);
    
    }

}
