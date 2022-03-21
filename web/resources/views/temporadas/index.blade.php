@extends('layout')

@section('cabecalho')
<div class="align-items-center d-flex">
    <img src="{{$serie->image_url}}" alt="" height="175" width="175" class="bg-light border object-fit-cover p-1 rounded-circle mr-4" />
    <h3 class="m-0">Temporadas<br/>{{$serie->nome}}</h3>
</div>
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/temporadas/{{$temporada->id}}/episodios">Temporada {{$temporada->numero}}</a>
        <span class="badge badge-secondary">
            {{$temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}
        </span>
    </li>
    @endforeach
</ul>
@endsection