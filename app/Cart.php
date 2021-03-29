<?php

namespace App;
use session;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    public $items = null;
    public $totalQty = 0;
    public $totalPrice=0;
    public $sub_cat=0;
    public $abc=0;
   
    public function __construct($oldCart)
    {
        if($oldCart)
        {
            
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->sub_cat = $oldCart->sub_cat;
            $this->abc = $oldCart->abc;
            
        }
    }

 
    public function remove($id,$qty)
    {
        
      
        
       // $this->items[$id]['qty'];
         $this->totalQty -= 1;
        //   $this->totalPrice =  $this->totalPrice - ($this->items[$id]['price'] * $qty);
      
          //  $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        $this->abc -= $qty;
        unset($this->items[$id]);
        return true;
    }
    public function add($item,$id,$q,$sub_cat)
    {
        
        $storedItem = ['qty'=>$q,'price'=>$item->price,'save'=>0,'item'=>$item,'sub_cat'=>$sub_cat];
        $id = $id;
        if($this->items)
        {
           
            if(array_key_exists($id,$this->items))
            {
                     //   $this->totalQty -= $this->items[$id]['qty'];
                     $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
      //   $this->totalQty++;
                $storedItem['price'] = $item->price * $storedItem['qty'];
             //   $storedItem= $this->items[$id];
            }
        }
        
        
       
       // $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->abc += $storedItem['qty'];
        $this->totalPrice += $storedItem['price'];

      
       
    }

    public function discount($item,$id,$q)
    {
        
  $discount =($item->price*$item->percentage)/100;
        $discount_price = $item->price - $discount;
        $storedItem = ['qty'=>$q,'price'=>$discount_price,'save'=>$discount,'item'=>$item];
        $id = $id;
        if($this->items)
        {
           
            if(array_key_exists($id,$this->items))
            {
                
            
                     $this->totalQty -= 1;
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
   
                $storedItem['price'] = $item->price * $storedItem['qty'];
         
            }
        }
        
        
       
      //  $storedItem['qty']++;
        $storedItem['price'] = $discount_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice +=  $storedItem['price'];

   
       
    }

 


}
