<?php
include_once 'model/adverts.php';
include_once 'controller/adverts_controller.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Immobilier</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="ajouter.php">Ajouter une annonce</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="consulter.php">Consulter toutes les annonces</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
</header>
<h2>Liste des biens</h2>
        <table class="container" >
          <tr>
              <th>id</th>
              <th>title</th>
              <th>description</th>
              <th>postal_code</th>
              <th>city</th>
              <th>type</th>
              <th>price</th>
              <th>reservation_message</th>
          </tr>
       
        <?php foreach($advertsList as $adverts): ?>
            <tr>
                <td><?= $adverts['id']?></td>
                <td><?= $adverts['title']?></td>
                <td><?= $adverts['description']?></td>
                <td><?= $adverts['postal_code']?></td>
                <td><?= $adverts['city']?></td>
                <td><?= $adverts['type']?></td>
                <td><?= $adverts['price']?></td>
                <td><?= $adverts['reservation_message']?></td>
            </tr>
        <?php endforeach; ?>
        </table>

</body>
</html>