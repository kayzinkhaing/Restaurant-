<?php
class OrderModel
{
    private $id;
    private $user_id;
    private $totalQty;
    private $totalAmount;

    // ID
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    // User ID
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    // Total Quantity
    public function setTotalQty($totalQty)
    {
        $this->totalQty = $totalQty;
    }
    public function getTotalQty()
    {
        return $this->totalQty;
    }

    // Total Amount
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    // Convert object properties to array
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'totalQty' => $this->getTotalQty(),
            'totalAmount' => $this->getTotalAmount()
        ];
    }
}
?>
