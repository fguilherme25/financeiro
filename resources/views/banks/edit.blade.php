@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Alteração de Banco</h2>

    <form action="{{ route('banks.update', ['bank' => $bank->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label>Código</label><br>
        <input type="text" name="code" id="code" placeholder="Código do Banco" value="{{ old('code',$bank->code) }}" required><br><br>

        <label>Nome do Banco</label><br>
        <input type="text" name="name" id="name" placeholder="Nome do Banco" value="{{ old('name',$bank->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>

@endsection