<?php
class Cliente{
    private $nome;
    private $contato;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getContato(){
        return $this->contato;
    }

    public function setContato($contato){
        $this->contato = $contato;
    }
}