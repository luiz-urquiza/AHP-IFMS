<?php

namespace App\Http\Controllers;
use App\Models\Objetivo;
use App\Models\Node;
use App\Models\Judments;

use Illuminate\Http\Request;

class NodesController extends Controller {
    
    public function index() {
       $objectives = Node::get()->where('level',0); 
       return view("objetivos.nodes")->with('objectives', $objectives);

    }

    public function criteria($id) {
        # select DISTINCT node.descr from judments inner join node on (judments.id_node1 = node.id OR judments.id_node2 = node.id) where judments.id_node = $id;

        $criteria = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('judments.id_node', $id)
            ->select('node.id','node.descr')
            ->distinct()
            ->get();
        $objective = Node::get()->where('id',$id);
        $goal = $objective[$id-1];
        
        //return view("objetivos.criterios")->with(["objetivo" => $objetivo]);
        return view("objetivos.criteria")->with('criteria', $criteria)->with('goal', $goal);
        
    }

    public function alternatives($id)  {
        # code...
        $alternatives = Judments::
        join('node', function ($join) {
        $join->on('judments.id_node1', '=', 'node.id')
        ->orOn('judments.id_node2', '=', 'node.id');
        })
        ->where('judments.id_node', $id)
        ->select('node.id')
        ->distinct()
        ->get();

        $v = array();

        foreach($alternatives as $a) {
            array_push($v, $a->id);
        }

        $alternatives = Judments::
        join('node', function ($join) {
        $join->on('judments.id_node1', '=', 'node.id')
        ->orOn('judments.id_node2', '=', 'node.id');
        })
        ->whereIn('judments.id_node', $v)
        ->select('node.descr')
        ->distinct()
        ->get();

        return view("objetivos.alternatives")->with('alternatives', $alternatives);
    }

    public function comparisons($up, $id) {
        # code...
        $funny = "Bom dia o sol já nasceu lá na fazendinha...";
        $criteria = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('judments.id_node', $up)
            ->select('node.id','node.descr')
            ->distinct()
            ->get();
        
        foreach($criteria as $c) {
            if($c->id == $id) $c1 = $c->descr;
        }
        
        foreach($criteria as $c) {
            if($c->id != $id) {
                echo $c1." X ".$c->descr."<hr>";
            }
        }        
    }

}
