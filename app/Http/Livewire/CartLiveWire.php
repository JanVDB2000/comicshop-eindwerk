<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartLiveWire extends Component
{
    public $cart;

    public function updateQuantity($id, $quantity){
        //telt het totaal aantal items in de winkelwagen
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalQuantity += $quantity;

        if($this->products[$id]['quantity'] < $quantity){
            $this->totalPrice -= ($this->products[$id]['quantity']*$this->products[$id]['product_price']);
            $this->totalPrice += $quantity*$this->products[$id]['product_price'];
        }else{
            $this->totalPrice -= ($this->products[$id]['quantity']-$quantity)*$this->products[$id]['product_price'];
        }
        $this->products[$id]['quantity'] = $quantity;
    }

    public function render()
    {
        return view('livewire.cart-live-wire');
    }
}
