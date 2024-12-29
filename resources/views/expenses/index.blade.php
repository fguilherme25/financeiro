@extends('layouts.main')

@section('title','Despesa')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Despesas</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item active">Despesas</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista das Despesas</div>
                <div class="ms-auto">
                    <a href="{{ route('expense.create') }}" class="btn btn-success btn-sm" role="button">Nova Despesa</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome da Despesa</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->name }}</td>
                                <td>{{ $expense->category->name }}</td>

                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('expense.show', ['expense' => $expense->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('expense.edit', ['expense' => $expense->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('expense.destroy', ['expense' => $expense->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
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
@endsection


