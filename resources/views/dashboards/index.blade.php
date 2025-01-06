@extends('layouts.main')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-primary border-start border-0 border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Receita Mês</p>
                                <h4 class="my-1 text-primary">R$ {{ number_format($totalRevenue, 2, ',', '.'); }}</h4>
                            </div>
                            <div class="text-primary ms-auto">
                                <i class="fa-solid fa-wallet fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-danger border-start border-0 border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Despesas Mês</p>
                                <h4 class="my-1 text-danger">R$ {{ number_format($totalExpense, 2, ',', '.'); }}</h4>
                            </div>
                            <div class="text-danger ms-auto">
                                <i class="fa-solid fa-dollar-sign fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10  border-warning border-start border-0 border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Resultado Mês</p>
                                <h4 class="my-1 text-warning">R$ {{ number_format($totalRevenue-$totalExpense, 2, ',', '.'); }}</h4>
                            </div>
                            <div class="text-warning ms-auto">
                                <i class="fa-solid fa-sack-dollar fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-info border-start border-0 border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Gastos Mês</p>
                                <h4 class="my-1 text-info">
                                    @if ($totalRevenue > 0)
                                        {{ number_format(($totalExpense/$totalRevenue)*100, 0); }} %
                                    @else
                                        0
                                    @endif
                                    
                                </h4>
                            </div>
                            <div class="text-info ms-auto">
                                <i class="fa-solid fa-chart-simple fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="text-center">
                <h4>Evolução Receitas x Despesas</h4>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6>Contas Bancárias</h6>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="w-75">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Banco</th>
                                            <th>Agência</th>
                                            <th>Conta</th>
                                            <th>Tipo</th>
                                            <th class="text-end">Saldo R$</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($accounts as $account)
                                            <tr class="{{ ($account->type=='CP' ? 'text-success' : '') }}">
                                                <td>{{ $account->bank->name }}</td>
                                                <td>{{ $account->agency }}</td>
                                                <td>{{ $account->number }} - {{ $account->digit }}</td>
                                                <td>{{ $account->type }}</td>
                                                <td class="text-end">{{ number_format($account->balance, 2, ',', '.'); }}</td>
                                            <tr>
                                        @empty
                                            <div class="alert alert-info" role="alert">
                                                Nenhuma Conta cadastrada!
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center w-25">
                            <div class="card p-5 shadow">
                                <table class="table">
                                    <tr>
                                        <td class="text-end">
                                            Conta: R$ 
                                        </td>
                                        <td class="text-end">
                                            {{ number_format($totalBalanceCC, 2, ',', '.'); }}
                                        </td>
                                    </tr>

                                    <tr class="text-success">
                                        <td class="text-end">
                                            Investimento: R$ 
                                        </td>
                                        <td class="text-end">
                                            {{ number_format($totalBalanceCP, 2, ',', '.'); }}
                                        </td>
                                    </tr>

                                    <tr class="fw-bold">
                                        <td class="text-end">
                                            Total: R$ 
                                        </td>
                                        <td class="text-end">
                                            {{ number_format(($totalBalanceCC + $totalBalanceCP) , 2, ',', '.'); }}
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection