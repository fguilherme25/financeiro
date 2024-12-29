@extends('layouts.main')

@section('title','Banco')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Bancos</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item active">Bancos</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista dos Bancos</div>
                <div class="ms-auto">
                    <a href="{{ route('bank.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Novo Banco</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nome do Banco</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banks as $bank)
                            <tr>
                                <td>{{ $bank->code }}</td>
                                <td>{{ $bank->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('bank.show', ['bank' => $bank->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('bank.edit', ['bank' => $bank->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('bank.destroy', ['bank' => $bank->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhum Banco cadastrado!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection