<?php

class PositionModel
{
    // Access Modifiers
    private $id;
    private $position;
    private $salary;

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

    // Setter for Position
    public function setPosition($position)
    {
        $this->position = $position;
    }

    // Getter for Position
    public function getPosition()
    {
        return $this->position;
    }

    // Setter for Salary
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    // Getter for Salary
    public function getSalary()
    {
        return $this->salary;
    }

    // Convert object to associative array
    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "position" => $this->getPosition(),
            "salary" => $this->getSalary()
        ];
    }
}
?>
