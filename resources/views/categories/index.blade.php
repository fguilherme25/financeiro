@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Lista de Categorias</h2>

    <a href="{{ route('categories.create') }}">Nova Categoria</a><br><hr><br>

    <x-alert />

    @forelse ($categories as $category)
        {{ $category->name }} 
        | <a href="{{ route('category.show', ['category' => $category->id]) }}">Abrir</a>
        | <a href="{{ route('category.edit', ['category' => $category->id]) }}">Editar</a>
        | <a href="{{ route('category.destroy', ['category' => $category->id]) }}">Excluir</a>
        <hr><br>
    @empty
        <p>Nenhuma Categoria cadastrado!</p>
    @endforelse

@endsection