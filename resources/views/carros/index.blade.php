@extends('layouts.app')
@section('title', 'Carros Cadastrados')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-8">Lista de carros</h4>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-succss">{{ session('success') }}</div>
            @endif

            <a href="{{ route('carros.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-circle "></i> Novo Carro
            </a>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-white">
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carros as $carro)
                            <tr>
                                <td>{{ $carro->marca }}</td>
                                <td>{{ $carro->modelo }}</td>
                                <td>{{ $carro->ano }}</td>
                                <td>R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                            </tr>
                            <td class="d-flex gap-2">
                                <a href="{{ route('carros.show', $carro->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye "></i>
                                </a>
                                <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil "></i>
                                </a>
                                <form action="{{ route('carros.destroy', $carro->id) }}" method="POST">
                                    @crsf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="bi bi-pencil "></i>
                                    </button>
                                </form>
                            </td>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum carro cadastrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
