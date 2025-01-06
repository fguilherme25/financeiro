@extends('layouts.main')

@section('title','Dashboard')

@section('content')

    @php use Carbon\Carbon; @endphp

    <div class="container-fluid mt-4 px-4">
        <div class="row">
            <div class="card radius-10">
                <div class="d-flex align-items-center mt-2 mb-2">
                    <form action="{{ route('creditcard.dashboard') }}" method="GET">
                        <div class="d-flex align-items-center">
                            <select name="creditcard_id" class="form-select form-select">
                                <option value="" disabled selected>Selecione o Cartão</option>
                                @foreach($creditcards as $creditcard)
                                    <option value="{{ $creditcard->id }}" {{ $creditcard->id==$currentCreditcard ? 'selected' : ''}}>
                                        {{ $creditcard->name }} - {{ $creditcard->category }} - {{ $creditcard->flag }}</option>
                                @endforeach
                            </select>

                            <select name="invoiceMonth" class="form-select form-select">
                                @foreach($allMonths as $month)
                                    <option value="{{ $month }}" {{ $month==$currentMonth ? 'selected' : ''}}>{{ $month }}</option>
                                @endforeach
                            </select>

                            <select name="invoiceYear" class="form-select form-select">
                                @foreach($allYears as $year)
                                    <option value="{{ $year }}" {{ $year==$currentYear ? 'selected' : ''}}>{{ $year }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-outline-success ms-1"><i class="fa-solid fa-filter"></i></i></button>
                            <a href="{{ route('creditcard.dashboard') }}" class="btn btn-outline-secondary ms-1"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    </form>
                </div>        
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-primary border-start border-0 border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Gastos Mês</p>
                                <h4 class="my-1 text-primary">R$ {{ number_format($totalExpense, 2, ',', '.'); }}</h4>
                            </div>
                            <div class="text-primary ms-auto">
                                <i class="fa-solid fa-wallet fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card radius-10">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h6>Resumo Despesas</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="table-responsive col-5">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Categoria</th>
                                        <th class="text-end">Valor R$</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($paymentsCategory as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td class="text-end">{{ number_format($category->total, 2, ',', '.'); }}</td>
                                        <tr>
                                    @empty
                                        <div class="alert alert-info" role="alert">
                                            Nenhuma Categoria cadastrada!
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive col-5">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Despesa</th>
                                        <th class="text-end">Valor R$</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($paymentsExpense as $payment)
                                        <tr>
                                            <td>{{ $payment->name }}</td>
                                            <td class="text-end">{{ number_format($payment->total, 2, ',', '.'); }}</td>
                                        <tr>
                                    @empty
                                        <div class="alert alert-info" role="alert">
                                            Nenhuma Despesa cadastrada!
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6>Cartões de Crédito</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Cartão</th>
                                    <th>Vencimento</th>
                                    <th class="text-end">Limite R$</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($creditcards as $creditcard)
                                    <tr>
                                        <td>{{ $creditcard->name }} - {{ $creditcard->category }} - {{ $creditcard->flag }}</td>
                                        <td>{{ $creditcard->duedate }}</td>
                                        <td class="text-end">{{ number_format($creditcard->limit, 2, ',', '.'); }}</td>
                                    <tr>
                                @empty
                                    <div class="alert alert-info" role="alert">
                                        Nenhum Cartão de Crédito cadastrado!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection