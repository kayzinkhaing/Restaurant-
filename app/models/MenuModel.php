<?php
						
class MenuModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $name;
    private $category_id;
    private $description;
    private $price;
    private $image;
    private $date;
    //private $Category;

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
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
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
            "name" => $this->getName(),
            "category_id" => $this->getCategoryId(),
            "description" => $this->getDescription(),
            "price" => $this->getPrice(),
            "image" => $this->getImage(),
            "date" => $this->getDate(),
        ];
    }
}