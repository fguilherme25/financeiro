@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Lista de Bancos</h2>

    <a href="{{ route('bank.create') }}">Novo Banco</a><br><hr><br>

    <x-alert />

    @forelse ($banks as $bank)
        {{ $bank->code }} - {{ $bank->name }} 
        | <a href="{{ route('bank.show', ['bank' => $bank->id]) }}">Abrir</a>
        | <a href="{{ route('bank.edit', ['bank' => $bank->id]) }}">Editar</a>
        | <a href="{{ route('bank.destroy', ['bank' => $bank->id]) }}">Excluir</a>
        <hr><br>
    @empty
        <p>Nenhum Banco cadastrado!</p>
    @endforelse

@endsection