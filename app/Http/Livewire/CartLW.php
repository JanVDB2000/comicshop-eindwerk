<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartLW extends Component{

    public $cart;

    public function render(){

        return view('livewire.cart-l-w');
    }


}
