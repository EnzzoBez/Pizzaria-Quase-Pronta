<?php
class Batatinha extends ItemDoPedido {
    protected $tamanho;

    protected $tipo = "batatinha";

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getValor(){
        if($this->tamanho === "g"){
            return 15;
        } elseif ($this->tamanho === "m") {
            return 10;
        } elseif ($this->tamanho === "p") {
            return 5;
        }
    }
}