<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        try{
            Log::info("Creating product");

            $validator = Validator::make($request->all(),[
                'name'=> ['required', 'string'],
                'size' => ['required', 'string'],
                'product_price' => ['required', 'integer'],
                'url' => ['required', 'string'],
                'color' => ['string'],
                'gender' => ['string']
            ]);

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ],400);
            }           

            $name = $request->input('name');
            $size = $request->input('size');
            $product_price = $request->input('product_price');
            $color = $request->input('color');
            $gender = $request->input('gender');
            $url = $request->input('url');

            $product = new Product();
            $product->name = $name;
            $product->size = $size;
            $product->product_price = $product_price;
            $product->color = $color;
            $product->gender = $gender;
            $product->url = $url;

            $product->save();

            return response()->json ([
                'success'=> true,
                'message'=> 'Product created'
            ],200);

        }catch(\Exception $exception){
            Log::error("Error creating product:" . $exception->getMessage());

            return response()->json([
                'succes'=> false,
                'message' => "Error creating product"
            ],500);
        }
    }

    public function productAll(){
        try{
            Log::info('Getting all Products');

        $userId = auth()->user()->id;

        $product = Product::get()->toArray();
        
        return response()->json([
            'success' => true,
            'message'=> 'Products retrieved succesfull',
            'data' => $product
        ]);

        }catch(\Exception $exception){
            Log::error('Error getting product' . $exception->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> 'Error creating product'
            ],500);
        }
    }

    public function updatedProduct(Request $request, $id){
        try{

            Log::info("Updated product");

            $validator = Validator::make($request->all(),[
                'name'=> ['string'],
                'url'=>['string']
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=> false,
                    'message'=> $validator->errors()
                ],400);
            };

            $userId = auth()->user()->id;

            $product = Product::query()->where('user_id', $userId)->find($id);

            if(!$product){
                return response()->json(
                    [
                        'success' => true,
                        'message'=> 'Error'
                    ]
                    );
            }

            $name = $request->input('name');
            $url = $request->input('url');

            $product->name = $name;
            $product->url = $url;
            
            if(isset($name)){
            };

            if(isset($url)){
            };

            $product->save();

            return response()->json([
                'success'=> true,
                'message'=> "Product" .$id. "updated"
            ],200);

        }catch(\Exception $exception){
            Log::error('Error updated product' . $exception->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updated product'
                ],500
            );
        }
    }

    public function deleteProduct($id){
        try{
            Log::info('Delete a product');

            $userId = auth()->user()->id;

            $product = Product::query()
            ->where('user_id', $userId)
            ->find($id);

            if(!$product){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Product doesnt exists'
                ],404);
            }

            $product->delete();

            return response()->json([
                'success'=>true,
                'message'=> 'Product' .$id.' deleted'
            ],200);

        }catch(\Exception $exception){
            Log::error('Error delete product' . $exception->getMessage());
            return response()->json(
                [
                    'success'=> false,
                    'message'=> 'Error delete product'
                ],500);
        }
    }
}
