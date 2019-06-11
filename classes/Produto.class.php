<?php

class Produto implements JsonSerializable {

    private $id;
    private $nome;
    private $descricao;
    private $marca;
    private $preco;
    private $largura;
    private $altura;

    public function __construct($id, $nome, $descricao, $marca, $preco, $largura, $altura) 
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setDescricao($descricao);
        $this->setMarca($marca);
        $this->setPreco($preco);
        $this->setLargura($largura);
        $this->setAltura($altura);
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
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

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
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of largura
     */ 
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * Set the value of largura
     *
     * @return  self
     */ 
    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    /**
     * Get the value of altura
     */ 
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function __toString() 
    {
        return "--> Produto <br>"
                . "ID = " . $this->getId() . "<br>"
                . "Nome = " . $this->getNome() . "<br>"
                . "Descricao = " . $this->getDescricao() . "<br>"
                . "Marca = " . $this->getMarca() . "<br>"
                . "Preco = " . $this->getPreco() . "<br>"
                . "Largura = " . $this->getLargura() . "<br>"
                . "Altura = " . $this->getAltura() . "<br>";
    }
}

?>