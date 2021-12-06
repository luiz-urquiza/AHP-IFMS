<?php

namespace App\Http\Controllers;
use App\Models\Objetivo;
use App\Models\Node;
use App\Models\Judments;
use Illuminate\Http\Request;
use App\Http\Controllers\AHPController;

class ReportController extends Controller {

    public function report($id) {
        $j_criteria = AHPController::GetCriteriaJudmentsMatrix($id, 0);
		$j_alternatives = AHPController::GetAlternativesJudmentsMatrix($id, 0);
		
		AHPController::Normalize($j_criteria);
		AHPController::GetPriority($j_criteria);
		AHPController::CheckConsistency($j_criteria);
        
        echo "<hr><b>Matrix of Criteria Judments:</b><br>";
        print_r($j_criteria);

        echo "<hr><b>Matrix of Alternatives Judments:</b><br>";
        print_r($j_alternatives);

        echo "<hr><b>Normalized Matrix of Criteria Judments:</b><br>";
        print_r(AHPController::Normalize($j_criteria));

        for($i = 0; $i < count($j_alternatives);$i++) {
            echo "<hr><b>Normalized Matrix of Alternatives Judments for Criterion ".($i+1).":</b><br>";
            print_r(AHPController::Normalize($j_alternatives[$i]));
        }

        echo "<hr><b>Consistency of Criteria Judments:</b><br>".
        AHPController::CheckConsistency($j_criteria);

        for($i = 0; $i < count($j_alternatives);$i++) {
            echo "<hr><b>Consistency of Alternatives Judments for Criterion ".($i+1).":</b><br>";
            echo AHPController::CheckConsistency($j_alternatives[$i]);
        }

        echo "<hr><b>Final Priorities:</b><br>";
		print_r(AHPController::FinalPriority($j_criteria, $j_alternatives));

    }
}
