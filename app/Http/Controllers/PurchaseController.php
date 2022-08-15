<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function createPurchase(Request $request){
        try{
            Log::info("Creating Purchase");

            $validator = Validator::make($request->all(),[
                'total_price'=> ['required', 'string'],
                'payment' => ['required', 'string'],
                'purchase_date' => ['required','string'],
                'product_id'=> ['required','integer']
            ]);

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ],400);
            }           

            $total_price = $request->input('total_price');
            $payment = $request->input('payment');
            $purchase_date = $request->input('purchase_date');
            $product_id = $request->input('product_id');
            $userId = auth()->user()->id;

            $purchase = new Purchase();
            $purchase->total_price = $total_price;
            $purchase->payment = $payment;
            $purchase->user_id = $userId;
            $purchase->purchase_date = $purchase_date;
            $purchase->product_id = $product_id;

            $purchase->save();

            return response()->json ([
                'success'=> true,
                'message'=> 'Purchase created'
            ],200);

        }catch(\Exception $exception){
            Log::error("Error creating purchase:" . $exception->getMessage());

            return response()->json([
                'succes'=> false,
                'message' => "Error creating Purchase"
            ],500);
        }
    }

    public function purchasesAll(){
        try{
            Log::info('Getting all Purchases');

        $userId = auth()->user()->id;

        $purchase = Purchase::where('user_id', $userId)
        ->get();
        
        return response()->json([
            'success' => true,
            'message'=> 'Purchase retrieved succesfull',
            'data' => $purchase
        ]);

        }catch(\Exception $exception){
            Log::error('Error creating purchases' . $exception->getMessage());
            return response()->json([
                'success'=> false,
                'message'=> 'Error creating purchase'
            ],500);
        }
    }

    public function updatedPurchase(Request $request, $id){
        try{

            Log::info("Updated Purchase");

            $validator = Validator::make($request->all(),[
                'total_price'=> ['string'],
                'payment' => ['string'],
                'purchase_date' => ['string'],
                'user_id'=>['integer'],
                'product_id'=> ['integer']
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=> false,
                    'message'=> $validator->errors()
                ],400);
            };

            $userId = auth()->user()->id;

            $purchase = Purchase::query()->where('user_id', $userId)->find($id);

            if(!$purchase){
                return response()->json(
                    [
                        'success' => true,
                        'message'=> 'Error'
                    ]
                    );
            }

            $total_price = $request->input('total_price');
            $payment = $request->input('payment');
            $purchase_date = $request->input('purchase_date');
            $product_id = $request->input('product_id');

            if(isset($total_price)){
                $purchase->total_price = $total_price;
            };

            if(isset($payment)){
                $purchase->payment = $payment;
            };

            if(isset($purchase_date)){
                $purchase->purchase_date = $purchase_date;
            };

            if(isset($product_id)){
                $purchase->product_id = $product_id;
            };

            $purchase->save();

            return response()->json([
                'success'=> true,
                'message'=> "Purchase" .$id. "updated"
            ],200);

        }catch(\Exception $exception){
            Log::error('Error updated purchase' . $exception->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updated purchase'
                ],500
            );
        }
    }

    public function deletePurchase($id){
        try{
            Log::info('Delete a purchase');

            $userId = auth()->user()->id;

            $purchase = Purchase::query()
            ->where('user_id', $userId)
            ->find($id);

            if(!$purchase){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Purchase doesnt exists'
                ],404);
            }

            $purchase->delete();

            return response()->json([
                'success'=>true,
                'message'=> 'Purchase' .$id.' deleted'
            ],200);

        }catch(\Exception $exception){
            Log::error('Error delete purchase' . $exception->getMessage());
            return response()->json(
                [
                    'success'=> false,
                    'message'=> 'Error delete purchase'
                ],500);
        }
    }
}
