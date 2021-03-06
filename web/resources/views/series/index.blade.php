@extends('layout')

@section('cabecalho')
<h3 class="m-0" >Séries</h3>
@endsection

@section('conteudo')

@auth
<div class="align-items-end d-flex flex-column">
    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-4">Adicionar</a>
</div>
@endAuth

@include('mensagem',['mensagem'=>$mensagem,'tipo'=>'success'])
<ul class="list-group">
    @foreach($series as $key => $serie)
    <li class="d-flex justify-content-between list-group-item align-items-center">
        <div>
            <img src="{{$serie->image_url}}" alt="" height="50" width="50" class="bg-light border object-fit-cover p-1 rounded-circle" />
            <span id="nome-serie-{{$serie->id}}">{{$serie->nome}}</span>
        </div>
        <div class="input-group w-50" hidden id="div-input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSerie('{{ $serie->id }}')">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>
        <span class="d-flex">
            @auth
            <button class="btn btn-primary mr-1" title="Editar Série" onclick="toggleInput('{{ $serie->id }}')">
                <i class="fas fa-pencil-alt"></i>
            </button>
            @endauth
            <a href="/series/{{$serie->id}}/temporadas" title="Visualizar Temporada(s)" class="btn btn-success d-flex align-items-center mr-1">
                <i class="fas fa-external-link-square-alt"></i>
            </a>
            @auth
            <form action="/series/{{$serie->id}}" method="post" title="Remover Série" onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}')" class="m-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
            @endauth
        </span>
    </li>
    @endforeach
</ul>
@endsection

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.querySelector(`#nome-serie-${serieId}`);
        const divInputSerieEl = document.querySelector(`#div-input-nome-serie-${serieId}`);

        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            divInputSerieEl.hidden = true;
        } else {
            nomeSerieEl.hidden = true;
            divInputSerieEl.removeAttribute('hidden')
        }
    }

    function editarSerie(serieId) {
        let formData = new FormData();

        const nome = document.querySelector(`#div-input-nome-serie-${serieId} > input`).value;
        const token = document.querySelector(`input[name='_token']`).value;

        formData.append("nome", nome);
        formData.append("_token", token);

        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            document.querySelector(`#nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>