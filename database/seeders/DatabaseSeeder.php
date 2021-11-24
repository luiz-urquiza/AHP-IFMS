<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     //   \App\Models\User::factory(10)->create();

        DB::table('objetivo')->insert([
			['descricao' => 'Formar um tecnólogo em Análise e Desenvolvimento de Sistemas']
		]);

        DB::table('criterio')->insert([
			['peso' => '1','descricao' => 'Desenvolver Sistemas de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Administrar Ambiente de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Prestar Suporte ao Cliente/Usuário','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Elaborar Documentação de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Estabelecer Padrões para Ambientes de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Projetar Soluções de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Pesquisar Inovações de Tecnologia da Informação','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Elaborar Planejamento e Execução de Testes','objetivo_id' => '1'],
			['peso' => '1','descricao' => 'Comunicar-se','objetivo_id' => '1'],
		]);

		//Populate Sample
		DB::table('node')->insert([
			['level' => 0, 'descr' => 'Comprar um Carro'], 
			['level' => 1, 'descr' => 'Custo'],
			['level' => 1, 'descr' => 'Conforto'],
			['level' => 1, 'descr' => 'Segurança'],
			['level' => 2, 'descr' => 'Carro1'],
			['level' => 2, 'descr' => 'Carro2'],
		]);

		//Julgamento dos Critérios com relação ao objetivo
		DB::table('judments')->insert([
			['id_node' => 1, 'id_node1' => 2, 'id_node2' => 3, 'score' => 7], //custo x conforto
			['id_node' => 1, 'id_node1' => 2, 'id_node2' => 4, 'score' => 3], //custo x segurança
			['id_node' => 1, 'id_node1' => 3, 'id_node2' => 4, 'score' => 1/3], //conforto x segurança
		]);

		//Julgamento das Alternativas com relação ao Custo
		DB::table('judments')->insert([
			['id_node' => 2, 'id_node1' => 5, 'id_node2' => 6, 'score' => 7],
		]);

		//Julgamento das Alternativas com relação ao Conforto
		DB::table('judments')->insert([
			['id_node' => 3, 'id_node1' => 5, 'id_node2' => 6, 'score' => 1/5],
		]);

		//Julgamento das Alternativas com relação ao Segurança
		DB::table('judments')->insert([
			['id_node' => 4, 'id_node1' => 5, 'id_node2' => 6, 'score' => 1/9],
		]);

    }
}