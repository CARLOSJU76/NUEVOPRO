@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
         
<h3>Insersión de Productos</h3>

<form action= "{{ route('insertarCategoria') }}"   method="POST" enctype="multipart/form-data">
@csrf    
<div class="mb-3">
        <label for="tipo_producto" class="form-label">Tipo de Producto</label>
        <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" placeholder="Categoría de Producto">
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