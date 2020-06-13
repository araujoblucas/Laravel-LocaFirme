<?php

namespace App;

class cart {
    public $items = null;
    public $totalQnt = 0;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQnt = $oldCart->totalQnt;
        }
    }

    public function add($item, $id){
        $storedItem = $item;
        if($this->items) {
            if(!array_key_exists($id, $this->items)){
                $this->totalQnt++;
                $this->items[$id] = $storedItem;
            }
        } else {
            $this->totalQnt++;
            $this->items[$id] = $storedItem;
        }
    }

    public function remove($item, $id){
        if($this->items) {
            if(array_key_exists($id, $this->items)){
                    unset($this->items[$id]);
                    $this->totalQnt--;
            }
        }
    }
}
