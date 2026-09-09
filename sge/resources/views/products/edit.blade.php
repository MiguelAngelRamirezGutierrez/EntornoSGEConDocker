@extends('layouts.app')

@section('titulo', 'Editar Producto')

@section('titulo_pagina', 'Modificar Producto')

@section('contenido')
<div class="card shadow-sm">
    <div class="card-body p-4">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio ($)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock (Cantidad)</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    Actualizar Producto
                </button>
            </div>
        </form>

    </div>
</div>
@endsection