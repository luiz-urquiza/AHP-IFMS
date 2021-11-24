<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\Judments;

class AHPController extends Controller {

	public function Normalize($matrix) {
		$dim = count($matrix);

		$sum_cols = array();

		for($i = 0; $i < $dim; $i++) {
			$tmp = 0;
			for ($j = 0; $j < $dim; $j++) {
				$tmp = $tmp + $matrix[$j][$i];			
			}
			array_push($sum_cols,$tmp);
		}
		
		$n_matrix = $matrix;
		for($i = 0; $i < $dim; $i++) {
			for ($j = 0; $j < $dim; $j++) {
				$n_matrix[$j][$i] = $matrix[$j][$i]/$sum_cols[$i];
			}
		}
		return($n_matrix);
	}

	public function GetPriority($julgamentos)	{
		$n_matrix = AHPController::normalize($julgamentos);
		$dim = count($n_matrix);
		$priority = array();
		
		for($i = 0; $i < $dim; $i++) {
			$sum_line = 0;
			for($j = 0; $j < $dim; $j++) {
				$sum_line += $n_matrix[$i][$j];
			}
			array_push($priority,$sum_line/$dim);
		}
		#print_r(array_values($priority));
		return($priority);
	}

	public function CheckConsistency($julgamentos) 	{
		$saaty = array(0,0,0.00001,0.58,0.9,1.12,1.24,1.32,1.41,1.45,1.49);
		$priority = AHPController::GetPriority($julgamentos);
		$dim = count($julgamentos);
		$tmp = 0;

		for($i = 0; $i < $dim; $i++) {
			for($j = 0; $j < $dim; $j++) {
				$tmp = $tmp + ($julgamentos[$i][$j] * $priority[$j]);
			}
		}
		$ci = ($tmp-$dim)/($dim - 1);
		$cr = $ci/$saaty[$dim];
		
		return $cr;
	}

	public function FinalPriority($j_criteria, $j_alternatives) {

		$c = count($j_alternatives); //quantidade de critérios
		$a = count($j_alternatives[0]); //quantidade de alternativas

		$final = array_fill(0, $a, 0);

		for($i = 0; $i < $a; $i++) {
			for($j = 0; $j < $c; $j++) {
				$final[$i] += AHPController::GetPriority($j_alternatives[$j])[$i] * AHPController::GetPriority($j_criteria)[$j];
			}
		}

		return($final);
	}

	public function GetMatrix($objective, $level) {
		$nodes = Node::get()->where('level', 1);

		foreach ($nodes as $node) {
			echo $node->level;
		}
	}

	public function GetCriteriaJudmentsMatrix($objective, $level) {
		//$judments = Judments::orderBy('id', 'DESC')->get()->where('id_node', 1)->where('id_node1', 2);
		$query = Judments::orderBy('id_node1', 'ASC')->get()->where('id_node', $objective);
		$judments = array();
		$k = 0;
		foreach($query as $q) {
			$judments[$k] = $q;
			$k++;
		}

		$order = intval(sqrt(2*count($judments)))+1;

		$criteria = array( array() );

		//preenche a matrix de julgamentos com 1
		for($i = 0; $i < $order; $i++) 
			for($j = 0; $j < $order; $j++) 
				$criteria[$i][$j] = 1;
		
		$k = 0;
		for($i = 0; $i < $order; $i++) {
			for($j = $i+1; $j < $order; $j++) {
				$criteria[$i][$j] = $judments[$k]->score;
				$criteria[$j][$i] = 1/$judments[$k]->score;				
				$k++;
			}
		}
		return($criteria);
	}

	public function GetAlternativesJudmentsMatrix($objective, $level) {
		//$judments = Judments::orderBy('id', 'DESC')->get()->where('id_node', 1)->where('id_node1', 2);
		$query = Judments::orderBy('id_node1', 'ASC')->get()->where('id_node', $objective);

		$criteria = array();

		foreach($query as $q) {
			array_push($criteria, $q->id_node1);
			array_push($criteria, $q->id_node2);
		}
		$id_criteria = array_unique($criteria);

		$hierarchy = array();

		foreach($id_criteria as $id) 

			array_push($hierarchy, AHPController::GetCriteriaJudmentsMatrix($id, 0));
		
		return($hierarchy);
	}

	public function AHP() 	{
		$j_criteria = array (
			array(1,7,3),
			array(1/7,1,1/3),
			array(1/3,3,1)
		  );
		  $j_alternatives = array();
		$j_alternatives[0] = array (
			array(1,7),
			array(1/7,1)
		);
		$j_alternatives[1] = array (
			array(1,1/5),
			array(5,1)
		);
		$j_alternatives[2] = array (
			array(1,1/9),
			array(9,1)
		);
		
		$j_criteria = AHPController::GetCriteriaJudmentsMatrix(1, 0);
		$j_alternatives = AHPController::GetAlternativesJudmentsMatrix(1, 0);

		  AHPController::Normalize($j_criteria);
		  AHPController::GetPriority($j_criteria);
		  AHPController::CheckConsistency($j_criteria);
		  AHPController::GetCriteriaJudmentsMatrix(1, 0);
		  AHPController::GetAlternativesJudmentsMatrix(1, 0);

		  print_r(AHPController::FinalPriority($j_criteria, $j_alternatives));

	}

	
}
