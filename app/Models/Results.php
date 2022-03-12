<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    private $objective;
    private $criteria;
    private $alternative;
    private $score;

    public function setObjective($objective) {
        $this->objective = $objective;
    }

    public function getObjective() {
        return $this->objective;
    }

    public function setCriteria($criteria) {
        $this->criteria = $criteria;
    }

    public function getCriteria() {
        return $this->criteria;
    }

    public function setAlternatives($alternative) {
        $this->alternative = $alternative;
    }

    public function getAlternatives() {
        return $this->alternative;
    }

    public function setScore($score) {
        $this->score = $score;
    }
    
    public function getScore() {
        return $this->score;
    }
}
