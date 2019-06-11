<?php

class Caminhao implements JsonSerializable {

    private $id;
    private $modelo;
    private $marca;
    private $nomeMotorista;

    public function __construct($id, $modelo, $marca, $nomeMotorista) 
    {
        $this->setId($id);
        $this->setModelo($modelo);
        $this->setMarca($marca);
        $this->setNomeMotorista($nomeMotorista);
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
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of nomeMotorista
     */ 
    public function getNomeMotorista()
    {
        return $this->nomeMotorista;
    }

    /**
     * Set the value of nomeMotorista
     *
     * @return  self
     */ 
    public function setNomeMotorista($nomeMotorista)
    {
        $this->nomeMotorista = $nomeMotorista;

        return $this;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function __toString() 
    {
        return "--> Caminhao <br>"
                . "ID = " . $this->getId() . "<br>"
                . "Modelo = " . $this->getModelo() . "<br>"
                . "Marca = " . $this->getMarca() . "<br>"
                . "Nome Motorista = " . $this->getNomeMotorista() . "<br>";
    }
}

?>