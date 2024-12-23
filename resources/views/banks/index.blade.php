@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Lista de Bancos</h2>

    <a href="{{ route('banks.create') }}">Novo Banco</a><br><hr><br>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @forelse ($banks as $bank)
        {{ $bank->code }} - {{ $bank->name }} 
        | <a href="{{ route('banks.show', ['bank' => $bank->id]) }}">Abrir</a>
        | <a href="{{ route('banks.edit', ['bank' => $bank->id]) }}">Editar</a>
        | <a href="{{ route('banks.destroy', ['bank' => $bank->id]) }}">Excluir</a>
        <hr><br>
    @empty
        <p>Nenhum Banco cadastrado!</p>
    @endforelse

@endsection