<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if(count($cats) === 0){
    	echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
    	foreach ($cats as $c) {
    		echo "<p>".$c->id." - ".$c->nome."</p>";
    	}
    }
});


Route::get('/produtos', function () {
    $prods = Produto::all();
    if(count($prods) === 0){
    	echo "<h4>Você não possui nenhum produto cadastrado</h4>";
    }else{
    	echo "<table>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<td>";
    	echo "Nome";
    	echo "</td>";
    	echo "<td>";
    	echo "Estoque";
    	echo "</td>";
    	echo "<td>";
    	echo "Preço";
    	echo "</td>";
    	echo "<td>";
    	echo "Categoria";
    	echo "</td>";
    	echo "</tr>";
    	echo "</thead>";
    	foreach ($prods as $p) {
    		echo "<tr>";
    		echo "<td>".$p->nome."</td>";
    		echo "<td>".$p->estoque."</td>";
    		echo "<td>".$p->preco."</td>";
    		echo "<td>".$p->categoria->nome."</td>";
    		echo "</tr>";
    	}
    	echo "</table>";
    }
});

Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();
    if(count($cats) === 0){
    	echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
    	foreach ($cats as $c) {
    		echo "<p>".$c->id." - ".$c->nome."</p>";

    		$produtos = $c->produtos;

    		if(count($produtos) > 0){
    			echo "<ul>";
    			foreach($produtos as $p){
    				echo "<li>".$p->nome."</li>";
    			}
    			echo "</ul>";
    		}
    	}
    }
});

Route::get('/categoriasprodutos/json', function () {
   	$cats = Categoria::with('produtos')->get();
   	return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
	$cat = Categoria::find(1);

   	$p = new Produto();
   	$p->nome = "Meu Novo Produto";
   	$p->estoque = 10;
   	$p->preco = 100;
   	$p->categoria()->associate($cat);
   	$p->save();

   	return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
   	$p = Produto::find(10);
   	
   	if(isset($p)){
   		$p->categoria()->dissociate();
   		$p->save();
   	}

   	return $p->toJson();
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
	$cat = Categoria::with('produtos')->find($catid);

	$p = new Produto();
   	$p->nome = "Meu Novo Produto Adicionado";
   	$p->estoque = 30;
   	$p->preco = 500;

   	if(isset($cat)) {
   		$cat->produtos()->save($p);
   	}

   	$cat->load('produtos');

   	return $cat->toJson();
});