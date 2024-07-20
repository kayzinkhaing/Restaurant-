<?php

class EmployeeModel
{
    // Access Modifiers
    private $id;
    private $name;
    private $position_id;
    private $email;
    private $phone_no;
    private $hire_date;

    // Setter for ID
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter for ID
    public function getId()
    {
        return $this->id;
    }

    // Setter for Name
    public function setName($name)
    {
        $this->name = $name;
    }

    // Getter for Name
    public function getName()
    {
        return $this->name;
    }

    // Setter for Position ID
    public function setPositionId($position_id)
    {
        $this->position_id = $position_id;
    }

    // Getter for Position ID
    public function getPositionId()
    {
        return $this->position_id;
    }

    // Setter for Email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter for Email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter for Phone Number
    public function setPhoneNo($phone_no)
    {
        $this->phone_no = $phone_no;
    }

    // Getter for Phone Number
    public function getPhoneNo()
    {
        return $this->phone_no;
    }

    // Setter for Hire Date
    public function setHireDate($hire_date)
    {
        $this->hire_date = $hire_date;
    }

    // Getter for Hire Date
    public function getHireDate()
    {
        return $this->hire_date;
    }

    // Convert object to associative array
    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "position_id" => $this->getPositionId(),
            "email" => $this->getEmail(),
            "phone_no" => $this->getPhoneNo(),
            "hire_date" => $this->getHireDate()
        ];
    }
}
?>
