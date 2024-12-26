@extends('layouts.main')

@section('title','Despesa')

@section('content')

    <h2>Nova Despesa</h2>

    <x-alert />

     <form action="{{ route('expense.store') }}" method="POST">
        @csrf

        <label>Nome da Categoria</label><br>

        <select name="category_id" id="category_id">
            <option value="" disabled selected>Selecione uma categoria</option>
            @foreach($categories as $category) 
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option> 
            @endforeach 
        </select><br><br>

        <label>Nome da Despesa</label><br>
        <input type="text" name="name" id="name" placeholder="Nome da Despesa" value="{{ old('name') }}"><br><br>

        <button type="submit">Salvar</button>

    </form>

@endsection