<?php
class Cerveja extends ItemDoPedido{
    protected $tamanho;
    protected $tipo;

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getValor(){
        if($this->tipo === "garrafa"){
            if($this->getTamanho() === "1l"){
                return 6.50;
            } else {
                return 4;
            }
        } elseif ($this->tipo === "latao"){
            return 2.49;
        }
    }
}