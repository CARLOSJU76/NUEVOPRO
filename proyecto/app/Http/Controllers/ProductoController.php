<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\IdTipos; 

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function bienvenida(){
        return view('producto.Bienvenida');
    }
    public function bye(){
        return view('producto.bye');
    }
    public function viewProducto(){
        return view('producto.viewProducto');
    }
    // public function viewInsertProd(){
    //     return view('producto.viewInsertProd');
    // }
    public function viewInsertProd()
    {
        // Obtener todos los tipos de producto desde la tabla id_tipos
        $tipos = IdTipos::all();  // Usamos el modelo IdTipos para obtener los tipos de producto

        // Pasar los tipos de producto a la vista
        return view('producto.viewInsertProd', compact('tipos'));  // Aquí 'tipos' será la variable que contiene los tipos de productos
    }
    //insertar producto
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'id_tipo' => 'numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->id_tipo = $request->id_tipo;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public/productos'); // Guarda en storage/app/public/productos
            $producto->foto = str_replace('public/', 'storage/', $path); // Ajusta para acceso público
        }
            $producto->save();
            return back()->with('success', 'Producto agregado correctamente');
    }
}
