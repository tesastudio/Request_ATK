<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsController extends Controller
{
    public function list(){
        // $data['getrecord'] = Dept::getrecord();
        $data['goods'] = goods::getrecord();
        $data['header_title'] = 'Goods List';
        return view('admin.goods.list',$data);
    }

    
}
