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


		//Problema 2 Escolha de Líder
		//https://en.wikipedia.org/wiki/Analytic_hierarchy_process_%E2%80%93_leader_example
		DB::table('node')->insert([
			['level' => 0, 'descr' => 'Choosing a Leader'], 
			['level' => 1, 'descr' => 'Experience'],
			['level' => 1, 'descr' => 'Education'],
			['level' => 1, 'descr' => 'Charisma'],
			['level' => 1, 'descr' => 'Age'],
			['level' => 2, 'descr' => 'Tom'],
			['level' => 2, 'descr' => 'Dick'],
			['level' => 2, 'descr' => 'Harry'],
		]);

		//Julgamento dos Critérios
		DB::table('judments')->insert([
			['id_node' => 7, 'id_node1' => 8, 'id_node2' => 9, 'score' => 4], //Experience x Education
			['id_node' => 7, 'id_node1' => 8, 'id_node2' => 10, 'score' => 3], //Experience x Charisma
			['id_node' => 7, 'id_node1' => 8, 'id_node2' => 11, 'score' => 7], //Experience x Age
			['id_node' => 7, 'id_node1' => 9, 'id_node2' => 10, 'score' => 1/3], //Education x Charisma
			['id_node' => 7, 'id_node1' => 9, 'id_node2' => 11, 'score' => 3], //Education x Age
			['id_node' => 7, 'id_node1' => 10, 'id_node2' => 11, 'score' => 5], //Age x Charisma
		]);

		//Julgamento das Alternativas com relação a Experience
		DB::table('judments')->insert([
			['id_node' => 8, 'id_node1' => 12, 'id_node2' => 13, 'score' => 3],
			['id_node' => 8, 'id_node1' => 12, 'id_node2' => 14, 'score' => 1/5],
			['id_node' => 8, 'id_node1' => 13, 'id_node2' => 14, 'score' => 1/7],
		]);

		//Julgamento das Alternativas com relação a Education
		DB::table('judments')->insert([
			['id_node' => 9, 'id_node1' => 12, 'id_node2' => 13, 'score' => 3],
			['id_node' => 9, 'id_node1' => 12, 'id_node2' => 14, 'score' => 1/5],
			['id_node' => 9, 'id_node1' => 13, 'id_node2' => 14, 'score' => 1/7],
		]);

		//Julgamento das Alternativas com relação a Charisma
		DB::table('judments')->insert([
			['id_node' => 10, 'id_node1' => 12, 'id_node2' => 13, 'score' => 5],
			['id_node' => 10, 'id_node1' => 12, 'id_node2' => 14, 'score' => 9],
			['id_node' => 10, 'id_node1' => 13, 'id_node2' => 14, 'score' => 4],
		]);

		//Julgamento das Alternativas com relação a Age
		DB::table('judments')->insert([
			['id_node' => 11, 'id_node1' => 12, 'id_node2' => 13, 'score' => 1/3],
			['id_node' => 11, 'id_node1' => 12, 'id_node2' => 14, 'score' => 5],
			['id_node' => 11, 'id_node1' => 13, 'id_node2' => 14, 'score' => 9],
		]);

    }
}