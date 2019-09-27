<?php
class Pension{
    private $id_pension;
    private $type;    

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of id_pension
     */ 
    public function getId_pension()
    {
        return $this->id_pension;
    }

    /**
     * Set the value of id_pension
     *
     * @return  self
     */ 
    public function setId_pension($id_pension)
    {
        $this->id_pension = $id_pension;

        return $this;
    }
}
?>