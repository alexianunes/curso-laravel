<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
        	["nome" => "Camiseta Polo", "preco" => 100, "estoque" => 4, "categoria_id" => 1]
        );
        DB::table('produtos')->insert(
        	["nome" => "Calça Jeans", "preco" => 120, "estoque" => 1, "categoria_id" => 1]
        );
        DB::table('produtos')->insert(
        	["nome" => "Camisa Manga Longa", "preco" => 34, "estoque" => 2, "categoria_id" => 1]
        );
        DB::table('produtos')->insert(
        	["nome" => "PC Gamer", "preco" => 56, "estoque" => 4, "categoria_id" => 2]
        );
        DB::table('produtos')->insert(
        	["nome" => "Impressora", "preco" => 37, "estoque" => 5, "categoria_id" => 6]
        );
        DB::table('produtos')->insert(
        	["nome" => "Mouse", "preco" => 77, "estoque" => 6, "categoria_id" => 6]
        );
        DB::table('produtos')->insert(
        	["nome" => "Perfume", "preco" => 55, "estoque" => 7, "categoria_id" => 3]
        );
        DB::table('produtos')->insert(
        	["nome" => "Cama de Casal", "preco" => 11, "estoque" => 8, "categoria_id" => 4]
        );
        DB::table('produtos')->insert(
        	["nome" => "Guarda Roupa", "preco" => 11, "estoque" => 8, "categoria_id" => 4]
        );

    }
}
