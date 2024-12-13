<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReq extends Model
{
    use HasFactory;
    protected $guarded = [];

    static public function getrecord(){
        $return = GoodsReq::Where('user_id','')
            ->orderBy('name')->get();
        return $return;
    }
}
