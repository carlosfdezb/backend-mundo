<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return response()->json([
            'message' => 'Backend mundo',
            'author' => 'Carlos Fernández',
            'entries' => [
                'getRegiones' => 'api/getRegiones',
                'getProvincias' => 'api/getProvincias/{id_region}?api_key={API_KEY}',
                'getCiudades' => 'api/getCiudades/{id_provincia}?api_key={API_KEY}',
                'getCalles' => 'api/getCalles/{id_ciudad}?api_key={API_KEY}',
            ],
        ], 201);
    }
}
