@extends('layouts.main')

@section('title','Pagamento')

@section('content')
    @php use Carbon\Carbon; @endphp

    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Pagamento</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('payment.index') }}" class="text-decoration-none">Pagamentos</a>
                </li>
                <li class="breadcrumb-item active">Alteração de Pagamento</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Alteração de Pagamento</div>
                <div class="ms-auto">
                    <a href="{{ route('payment.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-cash-register mx-2"></i>Pagamentos
                    </a>
                </div>
            </div>
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                    
                <div class="card-body">
                    <x-alert />

                    <select name="creditcard_id" id="creditcard_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione um Cartão de Crédito</option>
                        @foreach($creditcards as $creditcard) 
                            <option value="{{ $creditcard->id }}"
                                {{ old('creditcard_id', $payment->creditcard_id) == $creditcard->id ? 'selected' : '' }}>
                                    {{ $creditcard->name }} - {{ $creditcard->category }} - {{ $creditcard->flag }}
                            </option> 
                        @endforeach 
                    </select>

                    <select name="expense_id" id="expense_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione uma Despesa</option>
                        @foreach($expenses as $expense) 
                            <option value="{{ $expense->id }}"
                                {{ old('expense_id', $payment->expense_id) == $expense->id ? 'selected' : '' }}>
                                    {{ $expense->name }} - {{ $expense->category->name }}
                            </option> 
                        @endforeach 
                    </select>
 
                    <div class="d-flex">
                        <div class="form-floating mb-3 me-2">
                            <input type="text" class="form-control" name="date" id="date" value="{{ old('date', $payment->date) }}" placeholder="dd/mm/aaaa" required>
                            <label for="date">Data</label>
                        </div>

                        <div class="form-floating col-4 mb-3 me-2">
                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $payment->description) }}" required>
                            <label for="description">Descrição</label>
                        </div>
                        <div class="form-floating mb-3 me-2">
                            <input type="text" class="form-control text-end" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" required>
                            <label for="amount">Valor (R$)</label> 
                        </div>
                        <div class="form-floating mb-3 me-2">
                            <input type="number" class="form-control text-end" name="invoiceMonth" id="invoiceMonth" value="{{ old('invoiceMonth', $payment->invoiceMonth) }}" required>
                            <label for="amount">Mês</label> 
                        </div>
                        <div class="form-floating mb-3 me-2">
                            <input type="number" class="form-control text-end" name="invoiceYear" id="invoiceYear" value="{{ old('invoiceYear', $payment->invoiceYear) }}" required>
                            <label for="amount">Ano</label> 
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-floating mb-3 me-2">
                            <input type="number" class="form-control" name="first" id="first" value="{{ old('first', $payment->first) }}" required>
                            <label for="first">Parcela</label>
                        </div>

                        <div class="form-floating mb-3 me-2">
                            <input type="number" class="form-control" name="last" id="last" value="{{ old('last', $payment->last) }}" required>
                            <label for="last">De</label>
                        </div>
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

