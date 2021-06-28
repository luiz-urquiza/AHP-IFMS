<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
	private $objetivos = array(
		1 => array("id"=>"1", "nome"=>"Comprar um carro", "descricao"=>"Fazer a compra de um carro levando em consideração critérios como preço, conforto, economia, segurança, manutenção, etc."),
		2 => array("id"=>"2", "nome"=>"Escolher um livro", "descricao"=>"Escolher um livro para leitura baseado em critérios como conhecimento sobre o tema, área de interesse, número de páginas, etc."),
		3 => array("id"=>"3", "nome"=>"Comprar uma Moto", "descricao"=>"Comprar uma moto baseada em critérios de preço, cilindrada e esportividade"),
	);

	private $criterios = array(
		array("id"=>"1", "nome"=>"Custo", "objetivo_id"=>"3"),
		array("id"=>"2", "nome"=>"Cilindrada", "objetivo_id"=>"3"),
		array("id"=>"3", "nome"=>"Esportividade", "objetivo_id"=>"3"),
	);

	public function index(){

		$objetivos = $this->objetivos;

		return view("objetivos.objetivos")->with('objetivos', $objetivos);
	}

	public function criterios($id){
		// Mostras os critérios de um objetivo
		// Select * from criterios where objetivo_id = $id
		
		$objetivo = $this->objetivos[$id];
		$criterios = $this->criterios;
		$julgamento_ic = array();

		foreach ($criterios as $c1){
			foreach ($criterios as $c2){
				$julgamento_ic[] = array("objetivo_id" => 3, "criterio_id_1"=>c1["id"], "criterio_id_2"=>c2["id"]);
			}
		}

		return view("objetivos.criterios")->with(["objetivo" => $objetivo, "criterios" => $criterios, "julgamento_ic"=>$julgamento_ic]);
	}

	public function alternativas($id){
		// Mostras os critérios de um objetivo		
		return view("objetivos.alternativas")->with('id', $id);
	}
}
