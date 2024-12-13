<?php

namespace App\Livewire\GoodsReq;

use Livewire\Component;

class RequestStatus extends Component
{
    public function render()
    {
        return view('livewire.goodsreq.request-status')->extends('layouts.backend.blankpage');
    }
}
