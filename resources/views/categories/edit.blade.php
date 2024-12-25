@extends('layouts.main')

@section('title','Categoria')

@section('content')

    <h2>Alteração de Categoria</h2>

    <x-alert />

    <form action="{{ route('categories.update', ['category' => $category->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome da Categoria</label><br>
        <input type="text" name="name" id="name" placeholder="Nome da Categoria" value="{{ old('name',$category->name) }}" ><br><br>

        <button type="submit">Salvar</button>
    </form>

@endsection