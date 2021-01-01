<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celulares;
use GrahamCampbell\ResultType\Result;

class CelularController extends Controller
{
    //
    function celular () {
        return Celulares::all();
    }

    function add (Request $req) {

        $celular = new Celulares();
        $celular->name = $req->name;
        $celular->precio = $req->precio;
        $result = $celular->save();

        if($result){
            return ["Result"=>$result];
        }else{
            return ["Result"=>"operacion fallida"];
        }
    }

    public function delete ($id) {
        $celular = Celulares::find($id);
        $result = $celular->delete();
        
        if ( $result ) {
            return ["result"=> "ELIMINADO  ". $celular];
        }
        else{
            return ["result"=> "ERROR ". $celular];
            
        }
    }

    public function update ( Request $peticion ) {
        print($peticion->id);
        $encontrado = Celulares::find($peticion->id);
        $encontrado->name = $peticion->name;
        $encontrado->precio = $peticion->precio;
        $resultado = $encontrado->save();
        // // return "sinomia**************************";
        // if($resultado){
        //     return ["resultado"=>"bien hecho"];
        // }else {
        //     return ["ressultado"=>"mal hecho"];
        // }

    }
}
