@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
<div class="align-items-end d-flex flex-column">
    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-4">Adicionar</a>
</div>
@if($mensagem)
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
<ul class="list-group">
    @foreach($series as $key => $serie)
    <li class="d-flex justify-content-between list-group-item align-items-center">
        {{$serie->nome}}
        <form
        action="/series/{{$serie->id}}" 
        method="post"
        onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}')"
        >
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" ><i class="far fa-trash-alt"></i></button>
        </form>
    </li>
    @endforeach
</ul>
@endsection