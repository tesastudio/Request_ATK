<?php

namespace App\Livewire;

use Livewire\Component;

class UserTest extends Component
{
    public $dept;

    public function render()
    {
        return view('livewire.user-test')->extends('layouts.test');
    }
    public function store(){
        // dd('store');
        $this->dept = 'HR';
    }
}
