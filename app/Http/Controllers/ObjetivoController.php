<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Criterio;

class ObjetivoController extends Controller
{
	public function index(){

		$objetivos = Objetivo::get(); // SELECT * FROM objetivo

		return view("objetivos.objetivos")->with('objetivos', $objetivos);
	}

	public function formCreate(){
		return view("objetivos.formCreateObjetivo");
	}

	public function formCreateCriterio($id){
		// Prof Luiz: Alterei aqui
		$objetivo = Objetivo::find($id);
		return view("objetivos.formCreateCriterio")->with("objetivo", $objetivo);
	}

	public function create(Request $request){
		$data = $request->all();

		$objetivo = new Objetivo();
		$objetivo->descricao = $data['descricao'];

		$objetivo->save();

		return redirect('/objetivos');

	}
	public function createCriterio(request $request){
		$data = $request->all();

		$criterio = new Criterio();
		$criterio->objetivo_id = $data['objetivo_id'];
		$criterio->descricao = $data['descricao'];
		$criterio->peso = 1;
		$criterio->save();

		$url = "/objetivo/$criterio->objetivo_id/criterios";

		//var_dump($url);

		return redirect($url);
	}

	public function criterios($id){
		// Mostras os critérios de um objetivo
		// Select * from criterios where objetivo_id = $id
		
		$objetivo = Objetivo::find($id);
		$criterios = $objetivo->criterios();

		//var_dump($criterios);

		return view("objetivos.criterios")->with(["objetivo" => $objetivo, "criterios" => $criterios]);
	}

	public function alternativas($id){
		// Mostras os critérios de um objetivo		
		return view("objetivos.alternativas")->with('id', $id);
	}
}