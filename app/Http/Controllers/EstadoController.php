<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstadoController extends Controller
{

    public function index() : JsonResponse
    {
        return response()->json(Estado::all(), 200);
    }

}
