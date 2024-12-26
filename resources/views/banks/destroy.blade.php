@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Exclusão de Banco</h2>

    <form action="{{ route('bank.disable', ['bank' => $bank->id])}}" method="POST">
        @csrf
        @method('PUT')

        <h3>Deseja realmente excluir o Banco abaixo?</h3><hr>

        Código do Banco: {{ $bank->code }} <br><br>

        Nome do Banco: {{ $bank->name }} <br><br>

        <button type="submit">Confirmar</button> 
        | <a href="{{ route('bank.index') }}">Cancelar </a><br><hr><br>
    </form>

@endsection