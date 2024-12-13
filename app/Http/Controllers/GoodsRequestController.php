<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsRequestController extends Controller
{
    public function goodsrequest(){
        $data['goods'] = goods::getrecord();
        // $data['goodsreq'] = ?
    }
}
