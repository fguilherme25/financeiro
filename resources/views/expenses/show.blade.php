@extends('layouts.main')

@section('title','Despesa')

@section('content')

    <h2>Detalhes da Despesa</h2>

    <a href="{{ route('expense.index') }}">Voltar</a><br><hr><br>

    Nome da Categoria: {{ $expense->category->name }} <br><br>

    Nome da Despesa: {{ $expense->name }} <br><br>

@endsection