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
        ->select('node.id','node.descr')
        ->distinct()
        ->get();

        $objective = Node::get()->where('id',$id);
        $goal = $objective[$id-1];

        return view("objetivos.alternatives")->with('alternatives', $alternatives)->with('goal', $goal);;
    }

    public function comparisons($up, $id) {
        $ids = array();

        $query = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('node.id','=', $id)
            ->select('judments.id_node')
            ->distinct()
            ->get();

        foreach($query as $q) 
            array_push($ids, $q->id_node);
        
        $objective = Node::get()->whereIn('id',$ids);

        $criteria = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('node.id', '!=', $id)
            ->whereIn('judments.id_node', $ids)
            ->select('node.id','node.descr')
            ->distinct()
            ->get();

        $target = Node::where('id',$id)->get();
        
        return view("objetivos.comparisons")->with('itens', $criteria)->with('goal', $objective)->with('target', $target);       
    }

}
