<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Cart
{
    //
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalDuration = 0;
    public $totalBeneficiaries = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalDuration = $oldCart->totalDuration;
            $this->totalBeneficiaries = $oldCart->totalBeneficiaries;
        }
    }

    // 
    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->budget, 'duration' => $item->duration, 'beneficiaries' => $item->beneficiaries, 'item' => $item];

        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $storedItem['duration'] = $item->duration;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += preg_replace('/[ ,]+/', '', $item->budget);
        $this->totalDuration = $item->duration;
        $this->time_period = $item->time_period;
        $this->totalBeneficiaries = $item->beneficiaries;
    }
}
