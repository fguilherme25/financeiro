@extends('layouts.main')

@section('title','Despesas')

@section('content')

    <h2>Lista de Despesas</h2>

    <a href="{{ route('expense.create') }}">Nova Despesa</a><br><hr><br>

    <x-alert />

    @forelse ($expenses as $expense)
        {{ $expense->name }} - {{ $expense->category_id }}
        | <a href="{{ route('expense.show', ['expense' => $expense->id]) }}">Abrir</a>
        | <a href="{{ route('expense.edit', ['expense' => $expense->id]) }}">Editar</a>
        | <a href="{{ route('expense.destroy', ['expense' => $expense->id]) }}">Excluir</a>
        <hr><br>
    @empty
        <p>Nenhuma Despesa cadastrada!</p>
    @endforelse

@endsection