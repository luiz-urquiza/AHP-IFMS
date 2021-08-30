<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;

class ObjetivoController extends Controller
{
	private $criterios = array(
		array("id"=>"1", "nome"=>"Custo", "objetivo_id"=>"3"),
		array("id"=>"2", "nome"=>"Cilindrada", "objetivo_id"=>"3"),
		array("id"=>"3", "nome"=>"Esportividade", "objetivo_id"=>"3"),
	);

	public function index(){

		$objetivos = Objetivo::get(); // SELECT * FROM objetivo

		return view("objetivos.objetivos")->with('objetivos', $objetivos);
	}

	public function formCreate(){
		return view("objetivos.formCreateObjetivo");
	}

	public function create(Request $request){
		$data = $request->all();

		$objetivo = new Objetivo();
		$objetivo->descricao = $data['descricao'];

		$objetivo->save();

		return redirect('/objetivos');

	}

	public function criterios($id){
		// Mostras os critérios de um objetivo
		// Select * from criterios where objetivo_id = $id
		
		$objetivo = $this->objetivos[$id];
		$criterios = $this->criterios;

		return view("objetivos.criterios")->with(["objetivo" => $objetivo, "criterios" => $criterios]);
	}

	public function alternativas($id){
		// Mostras os critérios de um objetivo		
		return view("objetivos.alternativas")->with('id', $id);
	}
}