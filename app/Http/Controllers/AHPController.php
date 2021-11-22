<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AHPController extends Controller {

	public function Normalize($matrix) {
		$rows = count($matrix);
		$cols = count($matrix[0]);

		$sum_cols = array();

		for($i = 0; $i < $cols; $i++) {
			$tmp = 0;
			for ($j = 0; $j < $rows; $j++) {
				$tmp = $tmp + $matrix[$j][$i];			
			}
			array_push($sum_cols,$tmp);
		}
		
		$n_matrix = $matrix;
		for($i = 0; $i < $cols; $i++) {
			for ($j = 0; $j < $rows; $j++) {
				$n_matrix[$j][$i] = $matrix[$j][$i]/$sum_cols[$i];
			}
		}
		return($n_matrix);
	}

	public function GetPriority($julgamentos)	{
		$n_matrix = AHPController::normalize($julgamentos);
		$rows = count($n_matrix);
		$cols = count($n_matrix[0]);
		$priority = array();
		
		for($i = 0; $i < $rows; $i++) {
			$sum_line = 0;
			for($j = 0; $j < $cols; $j++) {
				$sum_line += $n_matrix[$i][$j];
			}
			array_push($priority,$sum_line/$cols);
		}
		#print_r(array_values($priority));
		return($priority);
	}

	public function CheckConsistency($julgamentos) 	{
		$saaty = array(0,0,0.00001,0.58,0.9,1.12,1.24,1.32,1.41,1.45,1.49);
		$priority = AHPController::GetPriority($julgamentos);
		$rows = count($julgamentos);
		$cols = count($julgamentos[0]);
		$tmp = 0;

		for($i = 0; $i < $rows; $i++) {
			for($j = 0; $j < $cols; $j++) {
				$tmp = $tmp + ($julgamentos[$i][$j] * $priority[$j]);
			}
		}
		$ci = ($tmp-$rows)/($rows - 1);
		$cr = $ci/$saaty[$rows];
		
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
		  AHPController::Normalize($j_criteria);
		  AHPController::GetPriority($j_criteria);
		  AHPController::CheckConsistency($j_criteria);
		  print_r(AHPController::FinalPriority($j_criteria, $j_alternatives));

	}

	
}
