{{-- resources/views/pessoas/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Pessoa')

@section('content')
  <div class="container">
    <h1 class="mb-4">Editar Pessoa</h1>

    <form action="{{ route('pessoas.update', $pessoa->id_pessoa) }}" method="POST" novalidate>
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" 
               class="form-control @error('nome') is-invalid @enderror" 
               id="nome" 
               name="nome" 
               value="{{ old('nome', $pessoa->nome) }}" 
               maxlength="50"
               required>
        @error('nome')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="sobrenome" class="form-label">Sobrenome</label>
        <input type="text" 
               class="form-control @error('sobrenome') is-invalid @enderror" 
               id="sobrenome" 
               name="sobrenome" 
               value="{{ old('sobrenome', $pessoa->sobrenome) }}" 
               maxlength="50"
               required>
        @error('sobrenome')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" 
               class="form-control @error('cpf') is-invalid @enderror" 
               id="cpf" 
               name="cpf" 
               value="{{ old('cpf', $pessoa->cpf) }}" 
               maxlength="11"
               minlength="11"
               required>
        @error('cpf')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select @error('tipo') is-invalid @enderror" 
                id="tipo" 
                name="tipo" 
                required>
          <option value="">Selecione o tipo</option>
          <option value="APICULTOR" {{ old('tipo', $pessoa->tipo) === 'APICULTOR' ? 'selected' : '' }}>APICULTOR</option>
          <option value="RESPONSAVEL" {{ old('tipo', $pessoa->tipo) === 'RESPONSAVEL' ? 'selected' : '' }}>RESPONSAVEL</option>
        </select>
        @error('tipo')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="{{ route('pessoas.show', $pessoa->id_pessoa) }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
  </div>
@endsection
