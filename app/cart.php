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
        $storedItem = ['qnt' => 0, 'item' => $item];
        if($this->items) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qnt']++;
        $this->items[$id] = $storedItem;
        $this->totalQnt++;
    }

    public function remove($item, $id){
        if($this->items) {
            if(array_key_exists($id, $this->items)){
                if($this->items[$id]['qnt'] > 1) {
                    $this->items[$id]['qnt']--;

                } else {
                    unset($this->items[$id]);
                }
            }
        }
        if($this->totalQnt > 0){
            $this->totalQnt--;
        }
    }
}
