@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Detalhes da Categoria</h2>

    <a href="{{ route('category.index') }}">Voltar</a><br><hr><br>

    Nome da Categoria: {{ $category->name }} <br><br>

    <hr>

    @forelse ($category->expense as $expense)
        {{ $expense->name }} <br>
    @empty
        <p>Nenhuma Despesa Cadastrada!</p>
    @endforelse
@endsection