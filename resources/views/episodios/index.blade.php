@extends('layout')

@section('cabecalho')
<small><span class="badge badge-secondary">{{$serie->nome}}</span></small>
<p>Temporada {{$temporada->numero}}</p>
@endsection

@section('conteudo')
<form action="" method="post">
    <ul class="list-group">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{$episodio->numero}}
            <input type="checkbox" class="" name="episodio[]" id="" />
        </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection