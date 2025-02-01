@extends('layouts.main')

@section('title','Pagamento')

@section('content')
    @php use Carbon\Carbon; @endphp

    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Pagamentos</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item active">Pagamentos</li>
            </ol>
        </div>
        <div class="row">
            <div class="card radius-10">
                <div class="d-flex align-items-center mt-2 mb-2">
                    <form action="{{ route('payment.index') }}" method="GET">
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
        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista de Pagamentos</div>
                <div class="ms-auto">
                    <a href="{{ route('payment.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Novo Pagamento</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Data</th>
                            <th>Cartão</th>
                            <th>Despesa</th>
                            <th>Descrição</th>
                            <th>Parcela</th>
                            <th class="text-end">Valor R$</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{ Carbon::parse($payment->date)->format('d/m/Y') }}</td>
                                <td>{{ $payment->creditcard->name }} - {{ $payment->creditcard->category }}</td>
                                <td>{{ $payment->expense->name }}</td>
                                <td>{{ $payment->description }}</td>
                                <td>{{ $payment->first }}/{{ $payment->last }}</td>
                                <td class="text-end">{{ number_format( $payment->amount, 2, ',', '.') }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('payment.show', ['payment' => $payment->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('payment.destroy', ['payment' => $payment->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>

                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Despesa cadastrado!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $payments->links() }}
            </div>
        </div>
    </div>
@endsection

