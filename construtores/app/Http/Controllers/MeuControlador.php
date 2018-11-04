<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){
    	echo "Alexia Nunes";
    }

    public function getIdade(){
    	return "20 anos";
    }

    public function multiplicar($n1, $n2){
    	return $n1 * $n2;
    }

    public function getNomeByID($id){
    	$v = ["Alexia", "David", "Bruno", "Zezinho"];
    	if($id >= 0 && $id < count($v)){
    		return $v[$id];
    	}else{
    		return "Não Encontrado";
    	}
    }
}
