<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetivo;
use App\Models\Criterio;

class ObjetivoController extends Controller {
	public function index(){

		$objetivos = Objetivo::get(); // SELECT * FROM objetivo

		return view("objetivos.objetivos")->with('objetivos', $objetivos);
	}

	public function formCreate(){
		return view("objetivos.formCreateObjetivo");
	}

	public function formCreateCriterio($id){
		// Prof Luiz: Alterei aqui;
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

		return view("objetivos.criterios")->with(["objetivo" => $objetivo]);
	}

	public function alternativas($id){
		// Mostras os critérios de um obj;		
		return view("objetivos.alternativas")->with('id', $id);
	}

	public function formUpdateCriterio($id){
		// Prof Luiz: Alterei aqui
		$criterio = Criterio::find($id);
		return view("objetivos.formUpdateCriterio")->with("criterio", $criterio);
	}

	public function updateCriterio(request $request){
		$data = $request->all();

		$criterio = Criterio::find($data['criterio_id']);
		$criterio->descricao = $data['descricao'];
		$criterio->peso = 1;
		$criterio->save();

		$url = "/objetivo/$criterio->objetivo_id/criterios";

		//var_dump($url);

		return redirect($url);
	}

	public function excluirCriterio($id){
		// Mostras os critérios de um objetivo
		$criterio = Criterio::find($id);		
	
		$objetivo_id = $criterio->objetivo->id;

		$criterio->delete();
	
		return redirect("/objetivo/$objetivo_id/criterios");
	}


	public function updateObjetivo(request $request){
		$data = $request->all();

		$objetivo = Objetivo::find($data['objetivo_id']);
		$objetivo->descricao = $data['descricao'];
	
		$objetivo->save();

		$url = "/objetivos";

		//var_dump($url);

		return redirect($url);
	}

	public function formUpdateObjetivo($id){
		// Prof Luiz: Alterei aqui
		$objetivo = Objetivo::find($id);
		return view("objetivos.formUpdateObjetivo")->with("objetivo", $objetivo);
	}

	public function excluirObjetivo($id){
		// Mostras os critérios de um objetivo
		$objetivo = Objetivo::find($id);		
	
		$objetivo->delete();
	
		return redirect("/objetivos");
	}
}