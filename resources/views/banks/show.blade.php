@extends('layouts.main')

@section('title','Banco')

@section('content')

    <h2>Detalhes do Banco</h2>

    <a href="{{ route('banks.index') }}">Voltar</a><br><hr><br>

    Código do Banco: {{ $bank->code }} <br><br>

    Nome do Banco: {{ $bank->name }} <br><br>

@endsection