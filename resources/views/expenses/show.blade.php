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
                <li class="breadcrumb-item active">{{ $expense->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Detalhes da Despesa</div>
                <div class="ms-auto">
                    <a href="{{ route('expense.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-money-check-dollar mx-2"></i>Despesas
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-1">Categoria</dt>
                    <dd class="col-sm-11">{{ $expense->category->name }}</dd>
                    <dt class="col-sm-1">Despesa</dt>
                    <dd class="col-sm-11">{{ $expense->name }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection