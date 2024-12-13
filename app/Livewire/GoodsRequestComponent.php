<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Goods;
use App\Models\GoodsReqDet;
use Auth;

class GoodsRequestComponent extends Component
{
    public $user;

    public function render()
    {
        // $data['header_title'] = 'Goods Request';
        // $data['goods'] = goods::getrecord();
        // dd(Auth::user());
        if(Auth::user()== null){
            return redirect()->route('login');
        }
        // $header_title = 'Goods Request';
        $goods = goods::getrecord();
        $goodsreqdet = GoodsReqDet::join('goods','goods.id','=','goods_req_dets.goods_id')
            ->where('user_id','=',Auth::user()->id)
            ->where('req_status','=',0)
            ->where('req_id','=',null)
            ->orderBy('goods_id')
            ->get(['goods_req_dets.id','goods.name','goods.goods_type','goods_req_dets.req_qty','goods_req_dets.unit']);
        return view('livewire.goods-request-component', compact('header_title','goods','goodsreqdet'))->extends('layouts.backend.blankpage');
    }

    public function select($id){
        
        $datagoods = Goods::find($id);
        $data = [
            'user_id' => Auth::user()->id,
            'req_status' => 0,
            'goods_id' => $id,
            'req_qty' => 0,
            'unit' => $datagoods->unit
        ];
        // dd($data);
        GoodsReqDet::create($data);
    }

    public function unselect($id){
        $data = GoodsReqDet::find($id)->delete();
    }
    public function clearall(){
        $data = GoodsReqDet::where('user_id','=',Auth::user()->id)
            ->where('req_status','=',0)->delete();
    }
    public function submit(){
        return redirect()->route('formgoodsrequest');
    }
}
