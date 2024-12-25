@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Nova Categoria</h2>

    <x-alert />

     <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label>Nome da Categoria</label><br>
        <input type="text" name="name" id="name" placeholder="Nome da Categoria" value="{{ old('name') }}"><br><br>

        <button type="submit">Salvar</button>

    </form>

@endsection