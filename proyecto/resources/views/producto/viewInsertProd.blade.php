@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
         
<h3>Insersión de Productos</h3>

<form action="{{ route('producto.insertproducto') }}" method="POST" enctype="multipart/form-data">
@csrf    
<div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
    </div>
    <div class="mb-3">
       
        <!-- <input type="text" class="form-control" id="stock" name="id_tipo" placeholder="CAtegoría del producto"> -->
        <label for="id_tipo">Tipo de Producto</label>
        <select name="id_tipo" id="id_tipo" class="form-control">
            <option value="" disabled selected>Seleccione un tipo de producto</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->tipo_producto }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Cargue un archivo</label>
        <input type="file" class="form-control-file" id="foto" name="foto">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@endsection