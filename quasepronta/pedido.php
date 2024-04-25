<?php
class Pedido{
    private $total = 0;
    private $taxaEntrega = 0;
    private $dataHoraPedido;
    private $cliente;
    private $endereco;
    private $itemDoPedido = [];

    public function getTotal() {
        return $this->total;
    }

    public function addTotal($total) {
        $this->total += $total;
    }

    public function getTaxaEntrega() {
        return $this->taxaEntrega;
    }

    public function setTaxaEntrega($bairro) {
        if($bairro === "centro"){
            $this->taxaEntrega = 10;
        }
        elseif($bairro === "periferia"){
            $this->taxaEntrega = 15;
        }
        else{
            $this->taxaEntrega = 20;
        }
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getDataHoraPedido() {
        return $this->dataHoraPedido;
    }

    public function setDataHoraPedido($hora) {
        $this->dataHoraPedido = $hora;
    }

    public function addItemDoPedido($itensDoPedido) {
        $this->itemDoPedido[] = $itensDoPedido;
    }

    public function imprimir($n){
        echo "Pedido nº: $n\n";
        echo $this->formatar("Cliente", $this->cliente->getNome())."\n";
        echo $this->formatar("Contato", $this->cliente->getContato())."\n";
        echo $this->formatar("Rua", $this->endereco->getRua())."\n";
        echo $this->formatar("Bairro", $this->endereco->getBairro())."\n";
        echo $this->formatar("Cidade", $this->endereco->getCidade())."\n";
        echo "----------------------------------------\n";
        for($i = 0; $i < count($this->itemDoPedido); $i++){
            echo $this->formatar("", $this->itemDoPedido[$i]->getTipo()." ".$this->itemDoPedido[$i]->getTamanho()." ".$this->itemDoPedido[$i]->getSabor()." ".strval($this->itemDoPedido[$i]->getValor()))."\n";
        }

        echo "----------------------------------------\n";
        echo $this->formatar("Tx. Entrega", $this->taxaEntrega)."\n";
        echo $this->formatar("Total", $this->total)."\n";
        echo $this->formatar("", date("H:i:s", $this->getDataHoraPedido()))."\n";
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
