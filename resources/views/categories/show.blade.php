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
                <div>Detalhes da Categoria</div>
                <div class="ms-auto">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-list mx-2"></i>Categorias
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-1">Nome</dt>
                    <dd class="col-sm-11">{{ $category->name }}</dd>
                </dl>

                <hr>

                <table class="table table-sm caption-top">
                    <caption>Despesas da Categoria</caption>
                    <thead>
                        <th>Despesa</th>
                    </thead>
                    <tbody>
                        @forelse ($category->expense as $expense)
                            <tr>
                                <td>{{ $expense->name }}</td>
                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Despesa cadastrada na Categoria!
                            </div>
                        @endforelse
                    </tbody>
                </table>                   
            </div>
        </div>
    </div>
@endsection