<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidades;
use GrahamCampbell\ResultType\Result;

class HabilidadController extends Controller
{
    //
    function habilidad() {
        return Habilidades::all();
    }
}
