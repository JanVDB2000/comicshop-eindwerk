<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartLiveWire extends Component
{
    public $cart;



    public function render()
    {
        return view('livewire.cart-live-wire');
    }
}
