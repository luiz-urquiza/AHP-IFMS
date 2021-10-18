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
		

		

    }
}
