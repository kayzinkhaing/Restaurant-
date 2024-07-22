<?php
class OrderModel
{					
    private $id;
    private $user_id;
    private $item_id;
    private $Quantity;
    private $total_amount;
    private $Status;
    private $Reg_Date;

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

    // Item ID
    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }
    public function getItemId()
    {
        return $this->item_id;
    }

    // Quantity
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }

    // Total Amount
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
    }
    public function getTotalAmount()
    {
        return $this->total_amount;
    }


    // Status
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }
    public function getStatus()
    {
        return $this->Status;
    }

    // Registration Date
    public function setRegDate($Reg_Date)
    {
        $this->Reg_Date = $Reg_Date;
    }
    public function getRegDate()
    {
        return $this->Reg_Date;
    }

    // Convert object properties to array
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'item_id' => $this->getItemId(),
            'Quantity' => $this->getQuantity(),
            'total_amount' => $this->getTotalAmount(),
            'Status' => $this->getStatus(),
            'Reg_Date' => $this->getRegDate()
        ];
    }
}
?>
