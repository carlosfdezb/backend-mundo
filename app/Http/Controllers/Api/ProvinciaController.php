<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Provincia;

class ProvinciaController extends Controller
{
    public function getProvincias($id_region) {
        $provincias = Provincia::where('id_region',$id_region)->get();
        return response()->json([
            'response' => $provincias,
        ], 200);
    }
}
