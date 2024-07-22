<?php

class CartModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $item_id;
    private $user_id;
    private $qty;
    private $total_price;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }
    public function getItemId()
    {
        return $this->item_id;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        return $this->qty;
    }
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function toArray()
    {
        return [
            "user_id" => $this->getUserId(),
            "item_id" => $this->getItemId(),
            "quantity" => $this->getQty(),
            "total_amount" => $this->getTotalPrice(),
        ];
    }
}
