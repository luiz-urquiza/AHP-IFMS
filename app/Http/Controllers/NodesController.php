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
        foreach($objective as $o) 
            $goal = $o;
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

    public function formCreateNode($up, Request $request) {
        
        $data = $request->all();
        $descr = "Node";
        $itens = array();
        $ids = array();
        if($up == 0) {
            array_push($itens, $up);
            $nodes = 1;
            $descr = "Decision Problem";
            return view("objetivos.formCreateNode")->with('itens', $itens)->with('nodes', $nodes)->with('descr', $descr)->with('up',$up);
        
        } elseif($data['type'] == 1) {

            // @query = Judments::select('id_node1','id_node2')->where('id_node', $up);
            // foreach($query as $q) { array_push($ids, $q->id_node1); array_push($ids, $q->id_node2); }
            // $ids = array_unique($ids);
            
            // echo "Alternativas";
        
        } else {
            $query = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('node.id','=', $up)
            ->select('judments.id_node')
            ->distinct()
            ->get();

        foreach($query as $q) 
            array_push($itens, $q->id_node);

            print_r($itens);

            return view("objetivos.formCreateNode")->with('itens', $itens)->with('nodes', $data['nodes'])->with('descr', $descr)->with('up',$up); 
        }
    }

	public function createNode($up, Request $request){
        
		$data = $request->all();
        $level = 0;
        $query = Node::where('id', $up);
        $ids = array();

        if( $query->count() > 0 ) {
            $level = 1 + $query->first()->level;
        }

        for($i = 0; $i < count($data['descricao']); $i++){
            $node = new Node();
            $node->level = $level;
            $node->descr = $data['descricao'][$i];
            $node->save();
            array_push($ids, $node->id);
        }
        
        if($level > 0) {
            for($i = 0; $i < count($ids); $i++) {
                for($j = $i+1; $j < count($ids); $j++) {
                    $judment = new Judments();
                    $judment->id_node = $up;
                    $judment->id_node1 = $ids[$i];
                    $judment->id_node2 = $ids[$j];
                    $judment->score = 1;
                    $judment->save();
                }
            }
        }
        return redirect('/nodes');
	}

    public function removeNode($id) {
        $v = array($id);
        $i = 0;

        do {
            $query = Judments::
            join('node', function ($join) {
            $join->on('judments.id_node1', '=', 'node.id')
            ->orOn('judments.id_node2', '=', 'node.id');
            })
            ->where('judments.id_node', $v[$i])
            ->select('node.id','node.descr')
            ->distinct()
            ->get();
            if(count($query) > 0) {
                foreach($query as $q)
                    array_push($v, $q->id);
            } 
            $i++;
        } while($i < count($v));
        $v = array_unique($v);
        Node::whereIn('id', $v)->delete();
        Judments::whereIn('id_node', $v)->delete();
        Judments::whereIn('id_node1', $v)->delete();
        Judments::whereIn('id_node2', $v)->delete();
        return redirect("/nodes");
    }
}