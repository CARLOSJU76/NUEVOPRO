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

        $lospitufos= Producto::all();

        return view('producto.viewProducto', compact('lospitufos'));
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

        if($request->hasFile('foto')){
            $imagen= $request->file('foto');
            $nombreImagen=$imagen->getClientOriginalName();
            $rutaImagen=$imagen->storeAs('productos', $nombreImagen, 'public');

        }
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->id_tipo = $request->id_tipo;
        $producto->foto=$nombreImagen;

            $producto->save();
            return back()->with('success', 'Producto agregado correctamente');
    }

    public function viewErase()
    {
        // Obtener todos los productos:
        $productos= Producto::all();
   
        return view('producto.viewEliminar', compact('productos'));  // Aquí 'tipos' será la variable que contiene los tipos de productos
    }
    
}
                                 