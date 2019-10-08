<!-- index.blade.php -->

@extends('layout')

@section('main')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Rua</td>
          <td>Número</td>
          <td>Bairro</td>
          <td>Coisa Teste</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
      @foreach($costumers as $costumer)
        <tr>
          <td>{{$costumer->id}}</td>
          <td>{{$costumer->name}}</td>
          <td>{{$costumer->street}}</td>
          <td>{{$costumer->streetNumber}}</td>
          <td>{{$costumer->neighborhood}}</td>
          <td>{{$dados[1][0]}}</td>

          <td><a href="{{ route('costumers.edit',$costumer->id)}}" class="btn btn-primary">Editar</a></td>
          <td>
              <form action="{{ route('costumers.destroy', $costumer->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Remover</button>
              </form>
          </td>
        </tr>
      @endforeach
    </tbody>
    <div>
      <form action="{{ route('costumers.create') }}" method="post">
        @method('GET')
        <button class='btn btn-success col-md-12' type="submit">Novo Cadastro</button>
      </form>
    </div>
  </table>
</div>
@endsection