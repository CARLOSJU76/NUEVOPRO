@extends('layouts.app')
@section('content')
    <h3>Ver Productos</h3>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Producto</th>
      <th scope="col">Categoría</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    
    <tr>
      <th scope="row">{{$producto->id}}</th>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->id_tipo}}</td>
      <td>{{$producto->precio}}</td>
      <td>
      <p>{{ asset($producto->foto) }}</p> <!-- Muestra la URL como texto para depuración -->
        <img src="{{ asset('storage/productos/'.$producto->foto) }}" width="50" alt="Imagen de {{ $producto->nombre }}"></td>
    </tr>

   @endforeach
  </tbody>
</table>
    
    @endsection('content')