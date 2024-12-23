@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Lista de Categorias</h2>

    <a href="{{ route('categories.create') }}">Nova Categoria</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

@endsection