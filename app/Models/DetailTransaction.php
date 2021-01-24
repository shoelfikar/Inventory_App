<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function Transaction()
    {
        return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    }

    public function Product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public static function detailTransaction()
    {
        $detailTransaction = DetailTransaction::with(['Transaction', 'Product'=> function($query){
            $query->groupBy(['Products.cat_id']);
        }])->get();
        return $detailTransaction;
    }
}
