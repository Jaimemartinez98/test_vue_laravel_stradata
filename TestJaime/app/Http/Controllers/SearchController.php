<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Search;
use Illuminate\Support\Str;

class SearchController extends Controller
{


    public function getSearches(){

        $searches = DB::table('searches as s')
        ->select('s.*')
        ->get();

        return response()->json($searches,200);

    }
    public function viewSearch($id){

        $search = Search::where('id',$id)->first();

        $array = $this->generateArray($search);

        return response()->json($array,200);

    }

    public function look(Request $request){

        $request->validate([
            'name' => 'required',
            'percent' => 'required'

        ],[
            'name.required' => 'El nombre es requerido',
            'percent.required' => 'El porcentaje es requerido'
        ]

    );

    $array = $this->generateArray($request);

    $search = new Search;
    $search->id = Str::uuid()->toString();
    $search->name = $request->name;
    $search->percent = $request->percent;
    $search->save();

    return response()->json($array,200);

    }



    public function generateArray($request){

        $chain = $request->name;
        $separator = " ";
        $separate_chain = explode($separator, $chain);

        $array = array();

        foreach($separate_chain as $value){

            $data = DB::table('dictionary as d')
            ->select('d.*')
            ->where('d.name', 'like', "%{$value}%")
            ->get();


            foreach ($data as $key) {
                if (!in_array($key, $array)) {
                    $match = similar_text(strtoupper($request->name), strtoupper($key->name), $percent);
                    $key->similarity = round($percent, 2);
                    if ($key->similarity >= $request->percent) {
                        array_push($array, $key);
                        }
                    }
                }
            }

        return $array;

    }
}
