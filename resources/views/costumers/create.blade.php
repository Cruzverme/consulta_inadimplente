<!-- create.blade.php -->

@extends('layouts.app')

@section('main')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card uper">
        <div class="card-header">
          Assinante
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
            <form method="post" action="{{ route('costumers.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nome:</label>
                    <input id="name" type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="rua">Rua :</label>
                    <input id="rua" type="text" class="form-control" name="street"/>
                </div>
                <div class="form-group">
                    <label for="numero">Número :</label>
                    <input id="numero" type="text" class="form-control" name="streetNumber"/>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro :</label>
                    <input id="bairro" type="text" class="form-control" name="neighborhood"/>
                </div>
                <button type="submit" class="btn btn-primary">Create Book</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection