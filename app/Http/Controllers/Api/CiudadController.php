<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function getCiudades($id_provincia) {
        $ciudades = Ciudad::where('id_provincia',$id_provincia)->get();
        return response()->json([
            'response' => $ciudades,
        ], 201);
    }
}
