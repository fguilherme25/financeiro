@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Novo Banco</h2>

    <form action="{{ route('banks.store') }}" method="POST">
        @csrf

        <label>Código</label><br>
        <input type="text" name="code" id="code" placeholder="Código do Banco" value="{{ old('code') }}" required><br><br>

        <label>Nome do Banco</label><br>
        <input type="text" name="name" id="name" placeholder="Nome do Banco" value="{{ old('name') }}" required><br><br>

        <button type="submit">Salvar</button>

    </form>

@endsection