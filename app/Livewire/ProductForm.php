<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductForm extends Component
{
    public $name;
    public $price;

    public function render()
    {
        return view('livewire.product-form');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $data = [
            'name' => $this->name,
            'price' => $this->price,
        ];
        Product::create($data);
        $this->name = null;
        $this->price = null;
        // dd($data);
        // $this->dispatch('productStore');
    }
}
