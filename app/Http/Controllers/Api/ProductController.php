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
        $product->image = asset('images/products/' . $product->image);
        if (is_null($product)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($product);
    }
    //!!::::::::::::::::::::: product By Category :::::::::::::::::::::::::


    public function getProductByCategory(Request $request){
        $id = $request->id;
        if(is_null($id)){
            return response()->json(['message' => 'id is requird'], 400);
        }
        $query = Product::where("category_id", $id);
      
        if($request->key){
            $query->where('name','LIKE','%'.$request->key.'%');
        }

        if($request->perpage){
            $perpage = $request->perpage;
         }else{
             $perpage = 10 ;
         }

        if($request->page){
           $products = $query->paginate($perpage);
        }else{
            $products = $query->get();
        }
        
         $products = $query->get();


         foreach($products as $product){
                    $product->image = asset('images/products/' . $product->image);
                }
        return response()->json(
            [
                'message' => 'Fetch Successfully',
                'data' => $products
            ] , 200
            );
    }
}
