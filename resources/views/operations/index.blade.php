@extends('layouts.main')

@section('title','Operação')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Operações</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item active">Operação</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Operações</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.create') }}" class="btn btn-success btn-sm" role="button">Nova Operação</a>
                </div>
            </div>
            <div class="card-body">
                <x-alert />

                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome da Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($operations as $operation)
                            <tr>
                                <td>{{ $operation->name }}</td>
                                <td class="d-flex flex-row-reverse">
                                    <a href="{{ route('operation.show', ['operation' => $operation->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('operation.edit', ['operation' => $operation->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
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