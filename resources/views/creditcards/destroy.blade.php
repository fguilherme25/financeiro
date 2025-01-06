@extends('layouts.main')

@section('title','Cartão de Crédito')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Cartão de Crédito</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('creditcard.index') }}" class="text-decoration-none">Cartões</a>
                </li>
                <li class="breadcrumb-item active">{{ $creditcard->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Exclusão de Cartáo de Crédito</div>
                <div class="ms-auto">
                    <a href="{{ route('creditcard.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-credit-card mx-2"></i>Cartões
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('creditcard.disable', ['creditcard' => $creditcard->id])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <h5>Deseja realmente excluir o Cartão de Crédito abaixo?</h5><hr>

                <dl class="row">
                    <dt class="col-sm-1">Bandeira</dt>
                    <dd class="col-sm-11">{{ $creditcard->flag }}</dd>
                    <dt class="col-sm-1">Nome</dt>
                    <dd class="col-sm-11">{{ $creditcard->name }}</dd>
                    <dt class="col-sm-1">Categoria</dt>
                    <dd class="col-sm-11">{{ $creditcard->category }}</dd>
                    <dt class="col-sm-1">Vencimento</dt>
                    <dd class="col-sm-11">Dia {{ $creditcard->duedate }}</dd>
                    <dt class="col-sm-1">Limite</dt>
                    <dd class="col-sm-11">{{ number_format( $creditcard->limit, 2, ',', '.') }}</dd>
                </dl>

                    <button type="submit" class="btn btn-danger btn-small">
                        <i class="fa-regular fa-circle-check mx-2"></i>
                        Confirmar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection