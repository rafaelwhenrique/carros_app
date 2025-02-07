@extends('layouts.app')
@section('title', 'Cadastrar Novo Carro')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-8">Cadastrar novo carro</h4>
        </div>

        <div class="card-body">
            <form action="`{{ route('carros.store') }} " method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Marca:</label>
                    <input type="text" name="marca" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Modelo:</label>
                    <input type="text" name="modelo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ano:</label>
                    <input type="number" name="ano" class="form-control" min="1990" max=" {{ date('Y') + 1 }} "
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Preço:</label>
                    <input type="number" step="0.01" name="preco" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>Salvar
                </button>
            </form>
        </div>
    </div>
@endsection