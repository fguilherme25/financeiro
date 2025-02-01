@extends('layouts.main')

@section('title','Operação')

@section('content')
    @php use Carbon\Carbon; @endphp

    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Operações</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Sistema</li>
                <li class="breadcrumb-item active">Operações</li>
            </ol>
        </div>

        <div class="d-flex align-items-center mt-2 mb-2">
            <form action="{{ route('operation.index') }}" method="GET">
                <div class="d-flex align-items-center">
                    <select name="account_id" class="form-select">
                        <option value="" disabled selected>Selecione a Conta</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}" {{ $account->id==$currentAccount ? 'selected' : ''}}>
                                {{ $account->bank->name }} / {{ $account->number }} - {{ $account->digit }}</option>
                        @endforeach
                    </select>

                    <input type="text" class="form-control" name="operationMonth" id="operationMonth" value="{{ $currentMonth }}" placeholder="Mês">
                    <input type="text" class="form-control" name="operationYear" id="operationYear" value="{{ $currentYear }}" placeholder="Ano">

                    <button type="submit" class="btn btn-outline-success ms-1"><i class="fa-solid fa-filter"></i></i></button>
                    <a href="{{ route('operation.index') }}" class="btn btn-outline-secondary ms-1"><i class="fa-solid fa-xmark"></i></a>
                </div>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista das Operações</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Nova Operação</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Data</th>
                            <th>Referente a</th>
                            <th>Descrição</th>
                            <th class="text-end">Valor R$</th>
                            <th>Tipo</th>
                            <th>Conta</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($operations as $operation)
                            <tr class="{{ ($operation->type =='D') ? 'text-danger' : (($operation->type =='C') ? 'text-success' : 'text-secondary'); }}">
                                <td>{{ Carbon::parse($operation->date)->format('d/m/Y') }}</td>
                                <td>{{ $operation->expense->name }} / {{ $operation->expense->category->name }}</td>
                                <td>{{ $operation->description }}</td>
                                <td class="text-end">{{ number_format($operation->amount, 2, ',', '.'); }}</td>
                                <td class="mx-5">{{ $operation->type }}
                                <td>{{ $operation->account->bank->name }} / {{ $operation->account->number }} - {{ $operation->account->digit }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('operation.show', ['operation' => $operation->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('operation.destroy', ['operation' => $operation->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Operação cadastrada!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $operations->links() }}
            </div>
        </div>
    </div>
@endsection