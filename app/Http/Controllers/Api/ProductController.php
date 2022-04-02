<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{

    //!!::::::::::::::::::::: get Product Details :::::::::::::::::::::::::

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($product);
    }
    //!!::::::::::::::::::::: product By Category :::::::::::::::::::::::::

    public function getProductByCategory()
    {
        $id = request('id');
        // dd(request('id'));
        if (is_null($id)) {
            // todo :  you have to change this line to validation with id filed requied
            return response()->json(['message' => 'id is requird'], 400);
        }
        //todo : you have to get by page and search

        $products = Product::where("category_id", $id)->get();
        return response()->json($products);
    }
}
