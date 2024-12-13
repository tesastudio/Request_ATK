<?php

namespace App\Livewire\Goodsreq;

use Livewire\Component;

use App\Models\Goods;
use App\Models\GoodsReqDet;
use Auth;

class AllocateReq extends Component
{
    public function render()
    {
        // $data['header_title'] = 'Goods Request';
        // $data['goods'] = goods::getrecord();
        // dd(Auth::user());
        if(Auth::user()== null){
            return redirect()->route('login');
        }
        $header_title = 'Alokasi ATK Requesition';
        // $goods = goods::getrecord();
        $goodslist = GoodsReqDet::join('goods as item','item.id','=','goods_req_dets.goods_id')
            ->join('goods_reqs','goods_reqs.id','=','goods_req_dets.req_id')
            ->join('depts','depts.id','=','goods_reqs.dept_id')
            ->join('users as usercreated','usercreated.id','=','goods_reqs.user_id')
            ->join('users as userdept','userdept.id','=','goods_reqs.depthead_id')
            // ->where('user_id','=',Auth::user()->id)
            ->where('gr_status','=',2)
            // ->where('req_id','=',null)
            ->orderBy('item.name')
            ->get(['goods_reqs.id','depts.deptname', 'usercreated.name as created','userdept.name as depthead' , 'item.name','item.goods_type','goods_req_dets.req_qty','goods_req_dets.unit',
                'item.qty_oh']);
        return view('livewire.goodsreq.allocate-req', compact('header_title','goodslist'))->extends('layouts.backend.blankpage');
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


