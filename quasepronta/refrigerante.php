<?php
class Refrigerante extends ItemDoPedido {
    protected $tamanho;
    protected $sabor;

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function getSabor(){
        return $this->sabor;
    }

    public function setSabor($sabor){
        $this->sabor = $sabor;
    }

    public function getValor(){
        if($this->tamanho === "2l"){
            return 8;
        } else {
            return 5;
        }
    }
}