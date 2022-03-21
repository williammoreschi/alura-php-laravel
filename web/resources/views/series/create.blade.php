@extends('layout')

@section('cabecalho')
<h3 class="m-0">Adicionar Série</h3>
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col col-4">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas" class="">N° temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col col-2">
            <label for="ep_por_temporada" class="">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
        <div class="col-4 col">
            <label for="capa" class="">Capa</label>
            <label id="file-custom" for="capa" class="file">
                <input type="file" id="capa" name='capa' aria-label="File browser example">
                <span class="text">Seleione uma imagem</span>
            </label>
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
<script type="text/javascript">
    const fileInput = document.querySelector('#file-custom input[type=file]');
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-custom .text');
            fileName.textContent = fileInput.files[0].name;
        }
    }
</script>
@endsection
