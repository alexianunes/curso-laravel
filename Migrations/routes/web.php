<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
	$cats = DB::table('categorias')->get();


	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";

	$nomes = DB::table('categorias')->pluck('nome');
	foreach ($nomes as $nome) {
		echo "$nome <br>";
	}

	echo "<hr>";

	$cats = DB::table('categorias')->where('id',1)->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";
	
	$cat = DB::table('categorias')->where('id',1)->first();
	
	echo "id: " . $cat->id . "; ";
	echo "nome: " . $cat->nome . "<br>";

	echo "<hr>";

	echo "<p>Retorna um array utilizando like</p>";

	$cats = DB::table('categorias')->where("nome", "like", "%p%")->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Sentenças Lógicas</p>";

	$cats = DB::table('categorias')->where("id", 1)->orWhere('id', 2)->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Intervalos</p>";

	$cats = DB::table('categorias')->whereBetween("id", [1, 3])->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo '<br><br>';

	$cats = DB::table('categorias')->whereNotBetween("id", [1, 3])->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<p>Conjuntos</p>";

	$cats = DB::table('categorias')->whereIn("id", [1, 3, 4])->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo '<br><br>';

	echo "<p>Conjuntos</p>";

	$cats = DB::table('categorias')->whereNotIn("id", [1, 3, 4])->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Sentenças Lógicas</p>";

	$cats = DB::table('categorias')->where([
		['id', 1],
		['nome', 'roupas']

	])->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Ordenando dados</p>";

	$cats = DB::table('categorias')->orderBy('nome')->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	echo '<br>';

	$cats = DB::table('categorias')->orderBy('id', 'desc')->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

});

Route::get('/novascategorias', function(){

	// DB::table('categorias')->insert([
	// 	['nome' => 'Cama mesa e banho'],
	// 	['nome' => 'Informatica'],
	// 	['nome' => 'Cozinha']
	// ]);

	$id = DB::table('categorias')->insertGetId(
		['nome' => 'Carros']
	);

	echo "Novo ID = $id <br>";
});


Route::get('/atualizandocategorias', function(){

	$cat = DB::table('categorias')->where('id',1)->first();

	echo "<p>Antes da Atualização: </p>";
	echo "id: " . $cat->id . "; ";
	echo "nome: " . $cat->nome . "<br>";

	DB::table('categorias')->where('id',1)
		->update(['nome' => 'Roupas Infantis']);

	$cat = DB::table('categorias')->where('id',1)->first();	
	echo "<p>Depois da Atualização: </p>";
	echo "id: " . $cat->id . "; ";
	echo "nome: " . $cat->nome . "<br>";

});


Route::get('/removendocategorias', function(){

	echo "<p>Antes da Remoção: </p>";

	$cats = DB::table('categorias')->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

	// DB::table('categorias')->where('id',1)->delete();

	DB::table('categorias')->whereNotIn('id',[1,2,3,4,5,6])->delete();


	echo "<p>Depois da Remoção: </p>";
		
	$cats = DB::table('categorias')->get();

	foreach($cats as $cat){
		echo "id: " . $cat->id . "; ";
		echo "nome: " . $cat->nome . "<br>";
	}

});
