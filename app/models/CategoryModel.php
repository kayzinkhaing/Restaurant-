<?php

class CategoryModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $name;
    private $date;

    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
       return $this->id ;
    }
   
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function toArray() {
        return [
            "id"=> $this->getId(),
            "name" => $this->getName(),
            "date" => $this->getDate()
        ];
    }
}