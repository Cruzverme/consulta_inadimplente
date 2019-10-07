<!-- edit.blade.php -->

@extends('layout')

@section('main')
<style>
  .uper {
    margin-top: 40px;
  }
</style>


<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('costumers.update', $costumer->id) }}">
      <div class="form-group">
        @csrf
        @method('PATCH')
        <label for="name">Nome:</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ $costumer->name }}"/>
      </div>

      <div class="form-group">
        <label for="rua">Rua :</label>
        <input id="rua" type="text" class="form-control" name="street" value="{{ $costumer->street }}"/>
      </div>

      <div class="form-group">
        <label for="numero">Número :</label>
        <input id="numero" type="text" class="form-control" name="streetNumber" value="{{ $costumer->streetNumber }}"/>
      </div>

      <div class="form-group">
        <label for="bairro">Bairro :</label>
        <input id="bairro" type="text" class="form-control" name="neighborhood" value="{{ $costumer->neighborhood }}"/>
      </div>

      <button type="submit" class="btn btn-primary">Atualizar Book</button>
    </form>
  </div>
</div>