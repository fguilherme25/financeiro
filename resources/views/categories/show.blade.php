@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Detalhes da Categoria</h2>

    <a href="{{ route('categories.index') }}">Voltar</a><br><hr><br>

    Nome da Categoria: {{ $category->name }} <br><br>

@endsection