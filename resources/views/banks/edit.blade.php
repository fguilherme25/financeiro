@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Alteração de Banco</h2>

    <x-alert />

    <form action="{{ route('bank.update', ['bank' => $bank->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label>Código</label><br>
        <input type="text" name="code" id="code" placeholder="Código do Banco" value="{{ old('code',$bank->code) }}" ><br><br>

        <label>Nome do Banco</label><br>
        <input type="text" name="name" id="name" placeholder="Nome do Banco" value="{{ old('name',$bank->name) }}" ><br><br>

        <button type="submit">Salvar</button>
    </form>

@endsection