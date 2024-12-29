@extends('layouts.main')

@section('title','Banco')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Banco</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('bank.index') }}" class="text-decoration-none">Bancos</a>
                </li>
                <li class="breadcrumb-item active">{{ $bank->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Alteração de Banco</div>
                <div class="ms-auto">
                    <a href="{{ route('bank.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-building-columns mx-2"></i>Bancos
                    </a>
                </div>
            </div>
            <form action="{{ route('bank.update', ['bank' => $bank->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="card-body">
                    <x-alert />

                    <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$bank->code) }}" placeholder="Código" required>
                        <label for="code">Código</label>
                    </div>

                   <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$bank->name) }}" placeholder="Nome do Banco" required>
                        <label for="code">Nome do Banco</label>
                    </div> 
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-download mx-1"></i>
                        Salvar
                    </button>
                </div>
            </form>               
        </div>
    </div>
@endsection