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
        <img src="{{ asset('storage/productos/'.$producto->foto) }}" width="50" alt="Imagen de {{ $producto->nombre }}">
      </td>
      <td>
        <form action = "{{ route ('eliminarP', $producto->id)}}" method='post' onsubmit="return confirm('Seguro que quieres eliminar este prodcuto?;')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>

   @endforeach
  </tbody>
</table>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    
    @endsection('content')