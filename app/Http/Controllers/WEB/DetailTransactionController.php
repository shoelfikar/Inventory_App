<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;

class DetailTransactionController extends Controller
{
    public function getDetailController($id)
    {
        $detail = DetailTransaction::detailTransaction($id);
        dd($detail);
    }
}
