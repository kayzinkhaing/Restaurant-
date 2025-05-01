<?php
class OrderItemModel
{
    private $id;
    private $order_id;
    private $menu_id;
    private $price;
    private $quantity;
    private $total_amount;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setMenu_id($menu_id)
    {
        $this->menu_id = $menu_id;
    }

    public function getMenu_id()
    {
        return $this->menu_id;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "order_id" => $this->getOrder_id(),
            "menu_id" => $this->getMenu_id(),
            "price" => $this->getPrice(),
            "quantity" => $this->getQuantity(),
            "TotalAmount" => $this->getTotalAmount()
        ];
    }
}
?>
