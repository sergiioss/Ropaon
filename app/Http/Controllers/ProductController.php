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
                'size' => ['string'],
                'product_price' => ['integer'],
                'url' => ['string'],
                'color' => ['string'],
                'gender' => ['string']
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=> false,
                    'message'=> $validator->errors()
                ],400);
            };

            $product = Product::query()
            ->where('id', $id)
            ->find($id);

            if(!$product){
                return response()->json(
                    [
                        'success' => true,
                        'message'=> 'Error'
                    ]
                    );
            }

            $name = $request->input('name');
            $size = $request->input('size');
            $product_price = $request->input('product_price');
            $color = $request->input('color');
            $gender = $request->input('gender');
            $url = $request->input('url');
            
            if(isset($name)){
                $product->name = $name;
            };

            if(isset($url)){
                $product->url = $url;
            };

            if(isset($size)){
                $product->size = $size;
            };

            if(isset($product_price)){
                $product->product_price = $product_price;
            };

            if(isset($color)){
                $product->color = $color;
            };

            if(isset($gender)){
                $product->gender = $gender;
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

            $product = Product::query()
            ->where('id', $id)
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

    public function productExpensive($price)
    {
        try {
            Log::info('Retrieved the most expensive products');

            $order = Product::where('product_price', '<', $price)
            ->orderBy('product_price', 'desc')
            ->get();

            return response()->json(
                [
                    'succes' => true,
                    'message' => $order,
                ]
                ,200);
            
        } catch (\Exception $exception) {
            Log::error('Error with the most expensive product' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error with the most expensive product'
            ], 500);
        }
    }

    public function productLowCost($price)
    {
        try {
            Log::info('Retrieved the most lowcost products');

            $order = Product::where('product_price', '<', $price)
            ->orderBy('product_price', 'asc')
            ->get();

            return response()->json(
                [
                    'succes' => true,
                    'message' => $order,
                ]
                ,200);
            
        } catch (\Exception $exception) {
            Log::error('Error with the most lowcost products' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error with the most lowcost products'
            ], 500);
        }
    }

    public function productName($letra)
    {
        try {
            Log::info('Retrieved the products name');

            $order = Product::where('name', 'like', $letra.'%')
            ->get();

            $cuantos = count($order);

            if($cuantos === 0){
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'There is no product with that name'
                    ],
                    
                );
            }

            return response()->json(
                [
                    'succes' => true,
                    'message' => $order,
                ]
                ,200);
            
        } catch (\Exception $exception) {
            Log::error('Error with the products name' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error with the products name'
            ], 500);
        }
    }
    
    public function productGenderF()
    {
        try {
            Log::info('Recovered female gender products');

            $order = Product::where('gender', 'like', 'F'.'%')
            ->get();

            $cuantos = count($order);

            if($cuantos === 0){
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Error with the female gender products'
                    ],
                    
                );
            }

            return response()->json(
                [
                    'succes' => true,
                    'message' => $order,
                ]
                ,200);
            
        } catch (\Exception $exception) {
            Log::error('Error with the female gender products' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error with the female gender products'
            ], 500);
        }
    }

    public function productGenderM()
    {
        try {
            Log::info('Recovered female gender products');

            $order = Product::where('gender', 'like', 'M'.'%')
            ->get();

            $cuantos = count($order);

            if($cuantos === 0){
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Error with the female gender products'
                    ],
                    
                );
            }

            return response()->json(
                [
                    'succes' => true,
                    'message' => $order,
                ]
                ,200);
            
        } catch (\Exception $exception) {
            Log::error('Error with the female gender products' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error with the female gender products'
            ], 500);
        }
    }
}
