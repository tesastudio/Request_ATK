<?php

namespace App\Livewire;

use Livewire\Component;

class ContactCreate extends Component
{
    public $data;
    public function mount($data){
        $this->data = $data;
    }

    public function render()
    {
        dd($data);
        return view('livewire.contact-create');
    }
}
