@extends('layouts.main')

@section('title','Cartão de Crédito')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Cartões de Crédito</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item active">Cartões</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista dos Cartóes</div>
                <div class="ms-auto">
                    <a href="{{ route('creditcard.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Novo Cartão</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Cartão</th>
                            <th>Bandeira</th>
                            <th>Categoria</th>
                            <th class="text-center">Vencimento</th>
                            <th class="text-end">Limite</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($creditcards as $creditcard)
                            <tr>
                                <td>{{ $creditcard->name }}</td>
                                <td>{{ $creditcard->flag }}</td>
                                <td>{{ $creditcard->category }}</td>
                                <td class="text-center">{{ $creditcard->duedate }}</td>
                                <td class="text-end">{{ number_format( $creditcard->limit, 2, ',', '.') }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('creditcard.show', ['creditcard' => $creditcard->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('creditcard.edit', ['creditcard' => $creditcard->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('creditcard.destroy', ['creditcard' => $creditcard->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>

                            </tr>
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
@endsection