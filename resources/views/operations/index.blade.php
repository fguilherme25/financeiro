@extends('layouts.main')

@section('title','Operação')

@section('content')

    <h2>Lista de Operações</h2>

    <a href="{{ route('operations.create') }}">Nova Operação</a>

@endsection