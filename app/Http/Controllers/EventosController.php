<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{

    public function index(){
        return Evento::all();
    }

    public function show($id){
        return Evento::find($id);
    }

    public function store(Request $request){
        $evento = Evento::create($request->all());

        return response()->json($evento, 201);
    }

    public function update(Request $request, $id){

        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        return response()->json($evento, 200);
    }

    public function delete($id){
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->json([
            "status"=>true,
        ]);
    }
}
