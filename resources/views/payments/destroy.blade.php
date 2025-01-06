@extends('layouts.main')

@section('title','Pagamento')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Pagamento</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('payment.index') }}" class="text-decoration-none">Pagamentos</a>
                </li>
                <li class="breadcrumb-item active">{{ $payment->expense->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Exclusão do Pagamento</div>
                <div class="ms-auto">
                    <a href="{{ route('payment.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-cash-register mx-2"></i>Pagamentos
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('payment.disable', ['payment' => $payment->id])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <h5>Deseja realmente excluir o Pagamento abaixo?</h5><hr>

                    <dl class="row">
                        <dt class="col-sm-1">Data</dt>
                        <dd class="col-sm-11">{{ $payment->date }}</dd>
                        <dt class="col-sm-1">Cartão</dt>
                        <dd class="col-sm-11">{{ $payment->creditcard->name }} - {{ $payment->creditcard->category }} - {{ $payment->creditcard->flag }}</dd>
                        <dt class="col-sm-1">Despesa</dt>
                        <dd class="col-sm-11">{{ $payment->expense->name }} - ({{ $payment->expense->category->name }})</dd>
                        <dt class="col-sm-1">Descrição</dt>
                        <dd class="col-sm-11">{{ $payment->description }}</dd>
                        <dt class="col-sm-1">Valor (R$)</dt>
                        <dd class="col-sm-11">{{ $payment->amount }}</dd>
                        <dt class="col-sm-1">Fatura</dt>
                        <dd class="col-sm-11">{{ $payment->invoiceMonth }}/{{ $payment->invoiceYear }}</dd>
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