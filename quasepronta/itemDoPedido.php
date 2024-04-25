<?php
abstract class ItemDoPedido{
    protected $tipo = "";
    protected $sabor = "";
    protected $borda = "";
    
    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getSabor(){
        return $this->sabor;
    }

    public function setSabor($sabor){
        $this->sabor = $sabor;
    }

    public function getborda(){
        return $this->borda;
    }
}