@extends('layout')

@section('cabecalho')
<div class="align-items-center d-flex">
<img src="{{$serie->image_url}}" alt="" height="175" width="175" class="bg-light border object-fit-cover p-1 rounded-circle mr-4" />
    <div>
        <h2 class="m-0">Temporada {{$temporada->numero}}</h2>
        <h3 class="m-0"><small><span class="badge badge-secondary">{{$serie->nome}}</span></small></h3>
    </div>
</div>
@endsection

@section('conteudo')

@include('mensagem',['mensagem'=>$mensagem,'tipo'=>'info'])

<form action="/temporadas/{{$temporada->id}}/episodios/assistidos" method="post">
    @csrf
    <ul class="list-group mb-2">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{$episodio->numero}}
            <input 
            type="checkbox" 
            class="apple-switch" 
            name="episodio[]" 
            value="{{$episodio->id}}"
            id="" 
            {{$episodio->assistido ? 'checked' : ''}} 
            />
        </li>
        @endforeach
    </ul>
    @auth
    <button class="btn btn-primary mb-2">Salvar</button>
    @endAuth
</form>
@endsection