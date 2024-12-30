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
                <div>Detalhes do Usuário</div>
                <div class="ms-auto">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-users mx-2"></i>Usuários
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-1">Nome</dt>
                    <dd class="col-sm-11">{{ $user->name }}</dd>
                    <dt class="col-sm-1">Email</dt>
                    <dd class="col-sm-11">{{ $user->email }}</dd>
                </dl>

                <hr>
            </div>
        </div>
    </div>
@endsection