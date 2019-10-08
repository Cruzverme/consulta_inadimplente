<!-- index.blade.php -->

@extends('layouts.app')

@section('main')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
@if (Auth::check()) 
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
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
        </table>
      </div>
    </div>
  </div>
</div>
@else
  <p>aeae</p>
@endif
@endsection