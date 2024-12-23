@extends('layouts.main')

@section('title','Conta')

@section('content')

    <h2>Listas de Contas</h2>

    <a href="{{ route('accounts.create') }}">Nova Conta</a>

@endsection