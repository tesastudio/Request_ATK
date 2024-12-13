<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Dept extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    // protected $table = 'depts';
    static public function getrecord(){
        $return = Dept::orderBy('deptname')->get();
        return $return;
    }
}
