{{-- resources/views/pessoas/destroy.blade.php --}}
@extends('layouts.app')

@section('title', 'Confirmar Exclusão')

@section('content')
  <div class="container">
    <h1 class="mb-4 text-danger">Confirmar Exclusão</h1>

    <p>Tem certeza que deseja excluir o perfil de <strong>{{ $pessoa->nome }} {{ $pessoa->sobrenome }}</strong>?</p>

    <form action="{{ route('pessoas.destroy', $pessoa->id_pessoa) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Sim, excluir</button>
      <a href="{{ route('pessoas.show', $pessoa->id_pessoa) }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
  </div>
@endsection
