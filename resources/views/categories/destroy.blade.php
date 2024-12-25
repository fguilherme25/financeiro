@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Exclusão de Categoria</h2>

    <form action="{{ route('categories.disable', ['category' => $category->id])}}" method="POST">
        @csrf
        @method('PUT')

        <h3>Deseja realmente excluir a Categoria abaixo?</h3><hr>

        Nome da Categoria: {{ $category->name }} <br><br>

        <button type="submit">Confirmar</button> 
        | <a href="{{ route('categories.index') }}">Cancelar </a><br><hr><br>
    </form>

@endsection