<?php
namespace models;

class vehiculo 
{
    private $Patente;
    private $Marca;
    private $Anio;
    private $Titular; 

    public function __construct($Patente,$Marca,$Anio,$Titular){
        $this->Patente = $Patente;
        $this->Marca = $Marca;
        $this->Anio = $Anio;
        $this->Titular = $Titular;
    }

    

    /**
     * Get the value of Patente
     */ 
    public function getPatente()
    {
        return $this->Patente;
    }

    /**
     * Set the value of Patente
     *
     * @return  self
     */ 
    public function setPatente($Patente)
    {
        $this->Patente = $Patente;

        return $this;
    }

    /**
     * Get the value of Marca
     */ 
    public function getMarca()
    {
        return $this->Marca;
    }

    /**
     * Set the value of Marca
     *
     * @return  self
     */ 
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;

        return $this;
    }

    /**
     * Get the value of Anio
     */ 
    public function getAnio()
    {
        return $this->Anio;
    }

    /**
     * Set the value of Anio
     *
     * @return  self
     */ 
    public function setAnio($Anio)
    {
        $this->Anio = $Anio;

        return $this;
    }

    /**
     * Get the value of Titular
     */ 
    public function getTitular()
    {
        return $this->Titular;
    }

    /**
     * Set the value of Titular
     *
     * @return  self
     */ 
    public function setTitular($Titular)
    {
        $this->Titular = $Titular;

        return $this;
    }
}




?>