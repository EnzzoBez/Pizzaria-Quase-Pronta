<?php
   echo "----------------------------------------\n";
   echo formatar("cliente", "asdf");
    
    function formatar(String $titulo, String $valor) {
       $divisoria = "----------------------------------------";
       $finalDiv = strlen($divisoria);
       $finalValor = strlen($titulo) + strlen($valor);
       while($finalDiv !== $finalValor && strlen($valor) < strlen($divisoria)){
        $valor = " " . $valor;
        $finalValor = strlen($titulo) + strlen($valor);
       }
       return $titulo . $valor;
    }