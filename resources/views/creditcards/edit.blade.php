@extends('layouts.main')

@section('title','Cartão de Crédito')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Cartão de Crédito</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cartão de Crédito</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('creditcard.index') }}" class="text-decoration-none">Cartões</a>
                </li>
                <li class="breadcrumb-item active">Novo Cartão</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>
                    Alteração de Cartão</div>
                <div class="ms-auto">
                    <a href="{{ route('creditcard.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-regular fa-credit-card mx-2"></i></i>Cartões
                    </a>
                </div>
            </div>
            <form action="{{ route('creditcard.update', ['creditcard' => $creditcard->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="card-body">
                    <x-alert />

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flag" id="flagElo" value="Elo"
                                {{ old('flag', $creditcard->flag) == 'Elo' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Elo</label>
                        </div>  

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flag" id="flagCredicard" value="Credicard"
                                {{ old('flag', $creditcard->flag) == 'Mastercard' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Mastercad</label>
                        </div> 

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flag" id="flagVisa" value="Visa"
                                {{ old('flag', $creditcard->flag) == 'Visa' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Visa</label>
                        </div>  
                        
                    </div>

                    <div class="form-floating mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $creditcard->name) }}" placeholder="Nome do Banco" required>
                        <label for="code">Nome do Cartão</label>
                    </div> 

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="categoryNormal" value="Normal"
                                {{ old('category', $creditcard->category) == 'Normal' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Normal</label>
                        </div>  

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="categoryGold" value="Gold"
                                {{ old('category', $creditcard->category) == 'Gold' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Gold</label>
                        </div>  

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="categoryPlatinum" value="Platinum"
                                {{ old('category', $creditcard->category) == 'Platinum' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Platinum</label>
                        </div>  

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="categoryBlack" value="Black"
                                {{ old('category', $creditcard->category) == 'Black' ? 'checked' : ''}}>
                            <label class="form-check-label" for="type">Black</label>
                        </div>  
                        
                    </div>

                    <div class="d-flex">
                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end" name="duedate" id="duedate" value="{{ old('duedate', $creditcard->duedate) }}" placeholder="Vencimento" required>
                            <label for="code">Vencimento</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end numeric-mask" name="limit" id="limit" value="{{ old('limit', $creditcard->limit) }}" placeholder="Limite" required>
                            <label for="code">Limite (R$)</label>
                        </div>

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