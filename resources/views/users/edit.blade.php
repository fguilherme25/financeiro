@extends('layouts.main')

@section('title','Usuário')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Usuário</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Administração</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('user.index') }}" class="text-decoration-none">Usuários</a>
                </li>
                <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Alteração de Usuário</div>
                <div class="ms-auto">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-users mx-2"></i>Usuários
                    </a>
                </div>
            </div>
            <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="card-body">
                    <x-alert />

                    <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$user->name) }}" placeholder="Nome" required>
                        <label for="code">Nome</label>
                    </div>

                   <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email',$user->email) }}" placeholder="Nome do Banco" required>
                        <label for="code">Email</label>
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