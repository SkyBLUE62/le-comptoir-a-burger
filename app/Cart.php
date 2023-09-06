<?php
    namespace App;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){

            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item, $produit_id){

            $storedItem = ['qty' => 0, 'produit_id' => 0, 'produit_nom' => $item->nom,
        'produit_prix' => $item->prix, 'produit_image' => $item->imageProduit, 'item' =>$item];

        if($this->items){
            if(array_key_exists($produit_id, $this->items)){
                $storedItem = $this->items[$produit_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['produit_id'] = $produit_id;
        $storedItem['produit_nom'] = $item->nom;
        $storedItem['produit_prix'] = $item->prix;
        $storedItem['produit_image'] = $item->imageProduit;
        $this->totalQty++;
        $this->totalPrice += $item->prix;
        $this->items[$produit_id] = $storedItem;
        }

        public function updateQty($id, $qty){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['produit_prix'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['produit_prix'] * $qty;

        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['produit_prix'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }


    }
?>
