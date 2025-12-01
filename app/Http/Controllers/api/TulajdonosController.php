<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tulajdonos;

class TulajdonosController extends Controller
{
    public function getTulajdonos(){
        $tulajdonos = Tulajdonos::all();
        return response()->json($tulajdonos);
    }
    public function addTulajdonos(Request $request){
        $tulajdonos = new Tulajdonos();
        $tulajdonos->alberlet_id = $request["alberlet_id"];
        $tulajdonos->nev = $request["nev"];
        $tulajdonos->email = $request["email"];
        $tulajdonos->jelszo =bcrypt($request["jelszo"]);
        $tulajdonos->save();
        return response()->json($tulajdonos);
    }
    public function updateTulajdonos(Request $request, $id){
        $tulajdonos = Tulajdonos::find($id);
        $tulajdonos->alberlet_id = $request["alberlet_id"];
        $tulajdonos->nev = $request["nev"];
        $tulajdonos->email = $request["email"];
        $tulajdonos->jelszo =bcrypt($request["jelszo"]);
        $tulajdonos->update();
        return response()->json($tulajdonos);
    }
    public function deleteTulajdonos($id){
        $tulajdonos = Tulajdonos::find($id);
        $tulajdonos->delete();
        return response()->json($tulajdonos);
    }
}
