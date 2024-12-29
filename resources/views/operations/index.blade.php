@extends('layouts.main')

@section('title','Operação')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Operações</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Sistema</li>
                <li class="breadcrumb-item active">Operações</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista das Operações</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.create') }}" class="btn btn-success btn-sm" role="button">Nova Operação</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Data</th>
                            <th>Referente a</th>
                            <th class="text-end">Valor R$</th>
                            <th>Conta</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($operations as $operation)
                            <tr>
                                <td>{{ $operation->date }}</td>
                                <td>{{ $operation->expense->name }}</td>
                                <td class="text-end">{{ number_format($operation->amount, 2, ',', '.'); }}</td>
                                <td class="ms-3">{{ $operation->account->bank->name }} / {{ $operation->account->number }} - {{ $operation->account->digit }}</td>
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
        </div>
    </div>
@endsection