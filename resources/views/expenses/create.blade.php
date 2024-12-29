@extends('layouts.main')

@section('title','Despesa')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Despesa</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('expense.index') }}" class="text-decoration-none">Despesas</a>
                </li>
                <li class="breadcrumb-item active">Nova Despesa</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Nova Despesa</div>
                <div class="ms-auto">
                    <a href="{{ route('expense.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-money-check-dollar mx-2"></i>Despesas
                    </a>
                </div>
            </div>
            <form action="{{ route('expense.store') }}" method="POST">
                @csrf
                    
                <div class="card-body">
                    <x-alert />

                    <select name="category_id" id="category_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione uma categoria</option>
                        @foreach($categories as $category) 
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option> 
                        @endforeach 
                    </select>

                   <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nome da Despesa" required>
                        <label for="code">Nome da Despesa</label>
                    </div> 
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-download mx-1"></i>
                        Salvar
                    </button>
                </div>
            </form>               
        </div>
    </div>
@endsection