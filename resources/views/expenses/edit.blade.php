@extends('layouts.main')

@section('title','Despesa')

@section('content')

    <h2>Alteração de Despesa</h2>

    <x-alert />

    <form action="{{ route('expense.update', ['expense' => $expense->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome da Categoria</label><br>
        <select name="category_id" id="category_id">
            @foreach($categories as $category) 
                <option value="{{ $category->id }}" {{ old('category_id',$expense->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
            @endforeach 
        </select><br><br>

        <label>Nome da Despesa</label><br>
        <input type="text" name="name" id="name" placeholder="Nome da Categoria" value="{{ old('name',$expense->name) }}" ><br><br>

        <button type="submit">Salvar</button>
    </form>

@endsection