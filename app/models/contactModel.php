<?php

class ContactModel
{
    // Access Modifiers
    private $id;
    private $address;
    private $callUs;
    private $emailUs;
    private $openingHours;

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

    // Setter for Address
    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Getter for Address
    public function getAddress()
    {
        return $this->address;
    }

    // Setter for Call Us
    public function setCallUs($callUs)
    {
        $this->callUs = $callUs;
    }

    // Getter for Call Us
    public function getCallUs()
    {
        return $this->callUs;
    }

    // Setter for Email Us
    public function setEmailUs($emailUs)
    {
        $this->emailUs = $emailUs;
    }

    // Getter for Email Us
    public function getEmailUs()
    {
        return $this->emailUs;
    }

    // Setter for Opening Hours
    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;
    }

    // Getter for Opening Hours
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    // Convert object to associative array
    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "address" => $this->getAddress(),
            "call_us" => $this->getCallUs(),
            "email_us" => $this->getEmailUs(),
            "opening_hours" => $this->getOpeningHours()
        ];
    }
}

?>
