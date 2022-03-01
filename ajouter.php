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
            <a class="nav-link active" aria-current="page" href="ajouter.php">Ajouter une annonce</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="consulter.php">Consulter toutes les annonces</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="one.php">Consulter une annonce</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
</header>


<main>
        <div class="container">
        <form method="POST" class="container">
            <fieldset class="row">
                <legend class="col-12"></legend>
                <div class="col-4">
                    <label for="title" class="form-label">Title&nbsp;: </label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= isset($_GET['update']) ? $adverts['title'] : "" ?>"/>
                    <span class="text-danger"><?=empty($error['title'])?'':$error['title']?></span>
                </div>
            </fieldset>
            <fieldset class="row">    
                <div class="col-8">
                    <label for="description" class="form-label">Description&nbsp;: </label>
                    <input type="text" id="description" name="description" rows="10" cols="33" value="<?= isset($_GET['update']) ? $adverts['description'] : "" ?>">
                    </input>
                    <span class="text-danger"><?=empty($error['description'])?'':$error['description']?></span>
                </div>
            </fieldset>
            <div class="col-2">
                    <label for="postal_code" class="form-label">Code postal&nbsp;:</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control" value="<?= isset($_GET['update']) ? $adverts['postal_code'] : "" ?>"/>
                    <span class="text-danger"><?=empty($error['postal_code'])?'':$error['postal_code']?></span>
                </div>
                <div class="col-5">
                    <label for="ville" class="form-label">Ville&nbsp;:</label>
                    <input type="text" name="city" id="ville" class="form-control" value="<?= isset($_GET['update']) ? $adverts['ville'] : "" ?>"/>
                    <span class="text-danger"><?=empty($error['ville'])?'':$error['ville']?></span>
                </div>
                <fieldset class="row">
                <div class="col-4 my-2">
                    <select name="type" id="type" class="form-select">
                        <option <?= isset($_GET['update']) ? "" : "selected" ?>> --- Sélectionnez ---</option>
                        <?php
                         if (isset($_GET['update'])){ ?>
                            <option value="<?= $adverts['type'] ?>" selected><?= $adverts['typeName'] ?></option>
                        <?php } ?>
                        <option value="1">Location</option>
                        <option value="2">Vente</option>    
                    </select>
                </div>
                <div class="col-2">
                    <label for="price" class="form-label">Prix&nbsp;:</label>
                    <input type="number" name="price" id="price" class="form-control" value="<?= isset($_GET['update']) ? $adverts['price'] : "" ?>"/>
                    <span class="text-danger"><?=empty($error['price'])?'':$error['price']?></span>
                </div>
            </fieldset>
            <fieldset class="row">    
                <div class="col-8">
                    <label for="reservation_message" class="form-label">reservation_message&nbsp;: </label>
                    <input type="text" id="reservation_message" name="reservation_message" rows="10" cols="33" value="<?= isset($_GET['update']) ? $adverts['reservation_message'] : "" ?>">
                    </input>
                    <span class="text-danger"><?=empty($error['reservation_message'])?'':$error['reservation_message']?></span>
                </div>
            </fieldset>
            <fieldset class="row">
                <div class="col-1">
                    <?php
                    if (isset($_GET['update'])){ ?>
                        <input class="btn btn-primary" name="edit" type="submit" value="Modifier"/>
                    <?php }else { ?>
                        <input class="btn btn-primary" name="submit" type="submit" value="Envoyer"/>
                    <?php } ?>
                    </div>
            </fieldset>
        </form>
        </div>
    </main>
</body>
</html>