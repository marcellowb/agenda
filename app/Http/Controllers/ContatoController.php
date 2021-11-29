<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoFormRequest;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index()
    {
        $contatos = Contato::orderBy('nome');
        $contatos->with(['estado']);

        return  response()->json($contatos->get(), 200);
    }

    public function store(ContatoFormRequest $request)
    {
        $data = $request->all();
        return  response()->json(Contato::create($data), 201);
    }

    public function show($id)
    {
        $contato = Contato::with([
            'estado'
        ])->findOrFail($id);
        return  response()->json($contato, 200);
    }

    public function update(ContatoFormRequest $request, Contato $contato)
    {
        $data = $request->all();
        return  response()->json($contato->update($data), 201);
    }

    public function destroy(Contato $contato)
    {
        $contato->delete();
        return response()->json([], 200);
    }
}
