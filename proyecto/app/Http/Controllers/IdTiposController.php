<?php

namespace App\Http\Controllers;
use App\Models\IdTipos;

use Illuminate\Http\Request;

class IdTiposController extends Controller
{
    public function viewTipos(){
        return view('producto.view_tipoP');
    }
    public function storeTipo(Request $request){
        $request->validate([
            'tipo_producto' => 'required|string|max:255',
        ]);

        $tipos = new IdTipos();
        $tipos->tipo_producto=$request->tipo_producto;

        $tipos->save();
        return back()->with('success', 'Categoría de producto agregado correctamente');
       
    }
    public function getCategotias()
    {
        // Obtener todos los tipos de producto
        $tipos = IdTipos::all();  // Recupera todos los tipos de la tabla id_tipos

        // Pasar los tipos de producto a la vista
        return view('producto.viewInsertProd', compact('tipos'));
    }

}
