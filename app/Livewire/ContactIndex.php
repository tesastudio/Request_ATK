<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    // public $data;
    public function render()
    {
        // $this->data = Contact::latest()->get();
        // return view('livewire.contact-index');

        return view('livewire.contact-index',['data' => Contact::latest()->get()
        ])->extends('layouts.backend.blankpage');
    }
}
