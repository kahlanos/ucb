<?php

class Delivery {

    public int $id;
    public string $socio;
    public string $encargado;
    public int $estado;
    public string $fecha;
   

    function __construct ($id, $socio, $encargado, $estado, $fecha) {

        $this->id = $id;
        $this->socio = $socio;
        $this->encargado = $encargado;
        $this->estado = $estado;
        $this->fecha = $fecha;

    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of socio
     */ 
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * Set the value of socio
     *
     * @return  self
     */ 
    public function setSocio($socio)
    {
        $this->socio = $socio;

        return $this;
    }

    /**
     * Get the value of encargado
     */ 
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * Set the value of encargado
     *
     * @return  self
     */ 
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

 



    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}