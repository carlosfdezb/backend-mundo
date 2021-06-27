<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Calle;

class CalleController extends Controller
{
    public function getCalles($id_ciudad) {
        $calles = Calle::where('id_ciudad',$id_ciudad)->get();
        return response()->json([
            'response' => $calles,
        ], 201);
    }
}
