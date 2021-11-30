<?php

namespace App\Http\Controllers;
use App\Models\Objetivo;
use App\Models\Node;
use App\Models\Judments;

use Illuminate\Http\Request;

class NodesController extends Controller {

    public $funny = "Bom dia o sol já nasceu lá na fazendinha...";
    
    public function index() {
       $objectives = Node::get()->where('level',0); 
       return view("objetivos.nodes")->with('objectives', $objectives);

    }

}
