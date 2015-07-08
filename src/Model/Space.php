<?php

namespace Polytype\Designer\Model;

class Space
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    private $accountName;
    
    public function getAccountName()
    {
        return $this->accountName;
    }
    
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
        
        return $this;
    }

    private $description;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
