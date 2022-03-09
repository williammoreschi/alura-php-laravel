<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
</head>
<body>
  <p>Ola Mundo</p>  
  <ul>
      <? foreach ($series as $key => $serie): ?>
        <li><?=$serie;?></li>
      <?php endforeach ?>
  </ul>
</body>
</html>