<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function index(){
		
		$objetivos = array(
			array("id"=>"1", "nome"=>"Comprar um carro", "descricao"=>"Fazer a compra de um carro levando em consideração critérios como preço, conforto, economia, segurança, manutenção, etc."),
			array("id"=>"2", "nome"=>"Escolher um livro", "descricao"=>"Escolher um livro para leitura baseado em critérios como conhecimento sobre o tema, área de interesse, número de páginas, etc."),
		);
		
		return view("objetivos.objetivos")->with('objetivos', $objetivos);
	}

	public function criterios($id=1){
		
		return view("objetivos.criterios")->with('id', $id);
	}
}
