@extends('layouts.main')

@section('title','Categoria')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Categoria</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('category.index') }}" class="text-decoration-none">Categorias</a>
                </li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Alteração de Categoria</div>
                <div class="ms-auto">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-list mx-2"></i>Categorias
                    </a>
                </div>
            </div>
            <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="card-body">
                    <x-alert />

                   <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$category->name) }}" placeholder="Nome da Categoria" required>
                        <label for="code">Nome da Categoria</label>
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