<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::latest()->get();
        return response()->json([CategoryResource::collection($data), 'contacts fetched.']);
    
    }
    public function show($id){
        $categories = Category::find($id);
        if (is_null($categories)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new CategoryResource($categories)]);
    }
    public function productByCategory($id){
            $category = Category::find($id);
            $category["products"] = $category->products;
            return json_decode($category);
    }
}
