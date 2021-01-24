<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $guarded = [];
    public static function createTransaction($request)
    {
        try {
            DB::transaction(function () use($request) {
                $cart = session('cart');
                $dataProduct = [];
                $transaction = Transaction::create([
                    'user_id'=> \Auth::user()->id,
                    'price_total'=> $request->price_total,
                    'qty_total'=> $request->qty_total,
                    'discount_total'=> $request->discount_total,
                    'type'=> $request->type
                ]);
                foreach($cart as $item){
                    $dataProduct[] = [
                        'transaction_id'=> $transaction->id,
                        'product_id'=> $item['product_id'],
                        'price'=> $item['price'],
                        'qty'=> $item['qty']
                    ];
                }
                DetailTransaction::insert($dataProduct);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
