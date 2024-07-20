<?php
class Order_itemsModel
{					
    // Access Modifier = public, private, protected
    	
    private $order_item_id;
    private $order_id;
    private $item_id;
    private $quantity;
    private $price;
   
    public function setOrder_item_id($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }
    public function getOrder_item_id()
    {
       return $this->order_item_id ;
    }
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }
    public function getOrder_id()
    {
       return $this->order_id ;
    }
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
    }
    public function getItem_id()
    {
       return $this->item_id ;
    }
   

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    					
    public function toArray() {
        return [
            "order_item_id"=> $this->getOrder_item_id(),
            "order_id"=> $this->getOrder_id(),
            "item_id" => $this->getItem_id(),
            "quantity" => $this->getQuantity(),
            "price" => $this->getPrice()
        ];
    }
}