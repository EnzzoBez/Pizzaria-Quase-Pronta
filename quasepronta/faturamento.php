<?php
class Faturamento{
    private $data;
    private $qtdPizzas = 0;
    private $qtdBatatinhas = 0;
    private $qtdCerveja = 0;
    private $qtdRefrigerante = 0;
    private $pedido = [];
    private $totalGeral = 0;
    private $totalMotoboy = 0;
    private $totalLiquido = 0;

    private $formatar;

    public function getQtdPizzas(){
        return $this->qtdPizzas;
    }

    public function addQtdPizzas(){
        $this->qtdPizzas++;
    }

    public function getQtdBatatinhas(){
        return $this->qtdBatatinhas;
    }

    public function addQtdBatatinhas(){
        $this->qtdBatatinhas++;
    }

    public function getQtdCerveja(){
        return $this->qtdCerveja;
    }

    public function addQtdCerveja(){
        $this->qtdCerveja++;
    }

    public function getQtdRefrigerante(){
        return $this->qtdRefrigerante;
    }

    public function addQtdRefrigerante(){
        $this->qtdRefrigerante++;
    }

    public function addPedido($pedido){
        $this->pedido[] = $pedido;
    }

    public function getTotalGeral(){
        return $this->totalGeral;
    }

    public function addTotalGeral($totalGeral){
        $this->totalGeral += $totalGeral;
    }

    public function getTotalMotoboy(){
        return $this->totalMotoboy;
    }

    public function addTotalMotoboy($totalMotoboy){
        $this->totalMotoboy += $totalMotoboy;
    }

    public function getTotalLiquido(){
        return $this->totalLiquido;
    }

    public function setTotalLiquido(){
        $this->totalLiquido = $this->totalGeral - $this->totalMotoboy;
    }

    public function setFormatar($formatar){
        $this->formatar = $formatar;
    }

    public function imprimirRelatorio(){
        echo "----------------------------------------";
        for($i = 0; $i < count($this->pedido); $i++){
            $this->pedido[$i]->imprimir($i+1);
        }
        echo $this->formatar("Pedidos realizados", strval(count($this->pedido)));
        echo $this->formatar("Qtd. Pizzas", strval($this->qtdPizzas));
        echo $this->formatar("Total Geral", strval($this->totalGeral));
        echo $this->formatar("Total Motoboy", strval($this->totalMotoboy));
        echo $this->formatar("Total Liquido", strval($this->totalLiquido));
        echo "----------------------------------------";

    }

    public function imprimirPedido($n){
        $this->pedido[$n-1]->imprimir($n);
    }
    
    public function imprimirCabecalho(){
        echo "----------------------------------------\n";
        echo "----------------------------------------\n";
    }

    public function formatar($titulo, $valor) {
        $divisoria = "----------------------------------------";
        $finalDiv = strlen($divisoria);
        $finalValor = strlen($titulo) + strlen($valor);
        while($finalDiv !== $finalValor && strlen($valor) < strlen($divisoria)){
         $valor = " " . $valor;
         $finalValor = strlen($titulo) + strlen($valor);
        }
        return $titulo . $valor;
     }
}