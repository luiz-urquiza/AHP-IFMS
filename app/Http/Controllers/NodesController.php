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

    public function criteria($id) {
        # select DISTINCT node.descr from judments inner join node on (judments.id_node1 = node.id OR judments.id_node2 = node.id) where judments.id_node = $id;

        $criteria = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('judments.id_node', $id)
            ->select('node.descr')
            ->distinct()
            ->get();

        return view("objetivos.criteria")->with('criteria', $criteria);
        
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

}
