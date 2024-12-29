@extends('layouts.main')

@section('title','Categoria')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Categorias</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item active">Categorias</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Lista das Categorias</div>
                <div class="ms-auto">
                    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa-regular fa-square-plus mx-1"></i>
                        Nova Categoria</a>
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
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('category.show', ['category' => $category->id]) }}" class="btn btn-primary btn-sm me-1"><i class="fa-solid fa-file-lines"></i></a>
                                    <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('category.destroy', ['category' => $category->id]) }}" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Categoria cadastrada!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection