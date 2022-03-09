<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Controle de Séries</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Séries</h1>
        </div>
        <div class="align-items-end d-flex flex-column">
            <a href="#" class="btn btn-dark mb-4">Adicionar</a>
        </div>
        <ul class="list-group">
            <? foreach ($series as $key => $serie) : ?>
                <li class="list-group-item"><?= $serie; ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</body>

</html>