<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Region;

class RegionController extends Controller
{
    public function getRegions() {
        $regions = Region::all();
        return response()->json([
            'response' => $regions,
        ], 201);
    }
}
