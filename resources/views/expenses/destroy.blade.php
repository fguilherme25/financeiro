@extends('layouts.main')

@section('title','Despesa')

@section('content')

    <h2>Exclusão de Despesa</h2>

    <form action="{{ route('expense.disable', ['expense' => $expense->id])}}" method="POST">
        @csrf
        @method('PUT')

        <h3>Deseja realmente excluir a Despesa abaixo?</h3><hr>

        Nome da Categoria: {{ $expense->category->name }} <br><br>

        Nome da Despesa: {{ $expense->name }} <br><br>

        <button type="submit">Confirmar</button> 
        | <a href="{{ route('expense.index') }}">Cancelar </a><br><hr><br>
    </form>

@endsection