@extends('layouts.main')

@section('title','Conta')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Contas</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item active">Contas</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista das Contas</div>
                <div class="ms-auto">
                    <a href="{{ route('account.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Nova Conta</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Banco</th>
                            <th>Agência</th>
                            <th>Conta</th>
                            <th>Tipo</th>
                            <th class="text-end">Limite</th>
                            <th class="text-end">Saldo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $account)
                            <tr>
                                <td>{{ $account->bank->name }}</td>
                                <td>{{ $account->agency }}</td>
                                <td>{{ $account->number }} - {{ $account->digit }}</td>
                                <td>{{ $account->type }}</td>
                                <td class="text-end">{{ number_format( $account->limit, 2, ',', '.') }}</td>
                                <td class="text-end">{{ number_format( $account->balance, 2, ',', '.') }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('account.show', ['account' => $account->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('account.edit', ['account' => $account->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('account.destroy', ['account' => $account->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>

                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Conta cadastrada!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection