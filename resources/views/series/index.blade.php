@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
<div class="align-items-end d-flex flex-column">
    <a href="/series/criar" class="btn btn-dark mb-4">Adicionar</a>
</div>
@if($mensagem)
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
<ul class="list-group">
    @foreach($series as $key => $serie)
    <li class="list-group-item">{{$serie->nome}}</li>
    @endforeach
</ul>
@endsection