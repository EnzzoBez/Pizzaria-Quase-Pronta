<?php
date_default_timezone_set('America/Sao_Paulo');

include "faturamento.php";
include "cliente.php";
include "endereco.php";
include "pedido.php";
include "itemDoPedido.php";
include "pizza.php";
include "refrigerante.php";
include "batatinha.php";
include "cerveja.php";
include "avaliacao.php";

$faturamento = new Faturamento();

echo "Bem vindo a pizzaria!\n";

while(true){
    echo "Selecione:\n";
    echo "1.Pedido\n";
    echo "2.Imprimir histórico\n";
    echo "3.Imprimir pedido\n";
    echo "#.Sair\n";
    $menu = readline();

    if($menu === "#"){
        break;
    }
    else if($menu === "1"){
        $pedido = new Pedido();
        $pedido->setDataHoraPedido(time());

        while(true){
            echo "Qual item:\n1.pizza\n2.batata\n3.cerveja\n4.refrigerante\n";
            $item = readline();
            
            switch($item){
                case "1":
                    $pizza = new Pizza();
                    $pizza->setTipo(readline("Informe o tipo de pizza: "));
                    $pizza->setSabor(readline("Informe o sabor de pizza: "));
                    $pizza->setTamanho(readline("Informe o tamanho da pizza: "));
                    $pizza->setBorda(readline("Informe o sabor da borda: "));
                    $pedido->addItemDoPedido($pizza);
                    $pedido->addTotal($pizza->getValor());
                    $faturamento->addQtdPizzas();
                    break;

                case "2":
                    $batatinha = new Batatinha();
                    $batatinha->setTamanho(readline("Informe o tamanho das batatinhas: "));
                    $pedido->addItemDoPedido($batatinha);
                    $pedido->addTotal($batatinha->getValor());
                    $faturamento->addQtdBatatinhas();
                    break;

                case "3":
                    $cerveja = new Cerveja();
                    $cerveja->setTipo(readline("Qual tipo? "));
                    if($cerveja->getTipo() === "latao"){
                        $cerveja->setTamanho("473ml");
                    }
                    if($cerveja->getTipo() === "garrafa"){
                        $cerveja->setTamanho(readline("Qual tamanho 330ml ou 1l? "));
                    }
                    $pedido->addItemDoPedido($cerveja);
                    $pedido->addTotal($cerveja->getValor());
                    $faturamento->addQtdCerveja();
                    break;

                case "4":
                    $refrigerante = new Refrigerante();
                    $refrigerante->setTamanho(readline("Qual tamanho 600ml ou 2l? "));
                    $refrigerante->setSabor(readline("Qual sabor? "));
                    $pedido->addItemDoPedido($refrigerante);
                    $pedido->addTotal($refrigerante->getvalor());
                    $faturamento->addQtdRefrigerante();
            }

            $continuar = readline("Mais alguma coisa? ");
            if($continuar === ""){
                break;
            }
        }

        $cliente = new Cliente();
        $cliente->setNome(readline("Cliente: "));
        $cliente->setContato(readline("Contato: "));
        $pedido->setCliente($cliente);

        $endereco = new Endereco();
        $endereco->setRua(readline("Rua: "));
        $endereco->setBairro(readline("Bairro: "));
        $endereco->setCidade(readline("Cidade: "));
        echo "\n";
        $pedido->setEndereco($endereco);

        $pedido->setTaxaEntrega($endereco->getBairro());
        $pedido->addTotal($pedido->getTaxaEntrega());

        $faturamento->addPedido($pedido);
        $faturamento->addTotalMotoboy($pedido->getTaxaEntrega());
        $faturamento->addTotalGeral($pedido->getTotal());
        $faturamento->setTotalLiquido();

    }
    else if($menu === "2"){
        $faturamento->imprimirCabecalho();
        $faturamento->imprimirRelatorio();
    }
    else if($menu === "3"){
        echo "Qual pedido: ";
        $p = readline();
        $faturamento->imprimirCabecalho();
        $faturamento->imprimirPedido($p);
    }
}