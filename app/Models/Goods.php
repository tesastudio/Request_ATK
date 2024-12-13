<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Goods extends Model
{
    use HasFactory;
    protected $guarded = [];

    static public function getrecord(){
        $return = Goods::orderBy('name');
        if(!empty(Request::get('goodsname')) ){
            $return = $return->where('name','like','%'.Request::get('goodsname').'%');
        }
        if(!empty(Request::get('goodstype')) ){
            $return = $return->where('goods_type','like','%'.Request::get('goodstype').'%');
        }
        $return = $return->orderBy('goods.name','asc')
            ->paginate(15);
        return $return;
    }

    // $goodsreqdet = GoodsReqDet::join('goods','goods.id','=','goods_req_dets.goods_id')
    // ->where('user_id','=',Auth::user()->id)
    // ->where('req_status','=',0)
    // ->where('req_id','=',null)
    // ->orderBy('goods_id')
    // ->get(['goods_req_dets.id','goods.name','goods.goods_type','goods_req_dets.req_qty','goods_req_dets.unit']);
    // static public function goodslist(){
    //     $return = self::select('goods_req_dets.id','goods.name','goods.goods_type','goods_req_dets.req_qty','goods_req_dets.unit')
    //         ->join('subjects','subjects.id','=','class_subjects.subject_id')
    //         ->join('kelas','kelas.id','=','class_subjects.kelas_id')
    //         ->join('users','users.id','=','class_subjects.created_by');

    //     if(!empty(Request::get('class_name'))){
    //         $return = $return->where('kelas.name', 'like', '%'.Request::get('class_name').'%');
    //     }
    //     if(!empty(Request::get('subject_name'))){
    //         $return = $return->where('subjects.name', 'like', '%'.Request::get('subject_name').'%');
    //     }
    //     if(!empty(Request::get('date'))){
    //         $return = $return->whereDate('class_subjects.created_at', '=', Request::get('date'));
    //     }

    //     $return = $return->where('class_subjects.is_delete','=',0)
    //         ->orderBy('class_subjects.id','desc')
    //         ->paginate(20);
    //     return $return;

    // }
}
