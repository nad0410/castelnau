<?php
$error = [];
$result = [];
$RX_ADRESS ='/^[a-zA-ZàâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý\d]{1}[a-zA-ZàâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý\d\s-]{0,254}$/';
$RX_NAME = '/^[a-zA-ZàâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý]{1}[a-zA-ZàâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý\s-]{0,49}$/';
$RX_ZIP ='/^\d{5}$/';
$adverts = new adverts();
$advertList = $adverts->getAdvert();


if(isset($_POST['submit']) || isset($_POST['edit'])){  
    if (!empty($_POST['title'])){
        if (preg_match($RX_NAME, $_POST['title'])){
            $adverts->title = $_POST['title'];
        }else{
            $error['title'] = "veuillez saisir un title valide";
        }
    }else{
        $error['title'] = "veuillez saisir votre title";
    }
    if (!empty($_POST['description'])){
        if (preg_match($RX_NAME, $_POST['description'])){
            $adverts->description = $_POST['description'];
        }else{
            $error['description'] = "veuillez saisir une description valide";
        }
    }else{
        $error['description'] = "veuillez saisir votre une description";
    }
    if (!empty($_POST['postal_code'])){
        if(preg_match($RX_ZIP, $_POST['postal_code'])){
            $adverts->postal_code = $_POST['postal_code'];
        }else {
            $error['postal_code'] = "Veuillez saisir un code postal valide";
        }
    }else {
        $error['postal_code'] = "Veuillez saisir un code postal";
    }
    if (!empty($_POST['city'])){
        if (preg_match($RX_NAME, $_POST['city'])){
            $adverts->city = $_POST['city'];
        }else {
            $error['city'] = "Veuillez saisir une city valide";
        }
    }else {
        $error['city'] = "veuillez saisir votre city";
    }
    if (!empty($_POST['type'])){
        if (filter_var($_POST['type'], FILTER_VALIDATE_INT)){
            $adverts->type = $_POST['type'];
        }else {
            $error['type'] = "Veuillez choisir un type valide";
        }
    }else {
        $error['type'] = "veuillez choisir un type";
    }
    if (!empty($_POST['price'])){
        if (filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)){
            $adverts->price = $_POST['price'];
        }else {
            $error['price'] = "Veuillez saisir un prix valide";
        }
    }else {
        $error['price'] = "veuillez saisir votre prix";
    }
    if (!empty($_POST['reservation_message'])){
        if (preg_match($RX_NAME, $_POST['reservation_message'])){
            $adverts->reservation_message = $_POST['reservation_message'];
        }else {
            $error['reservation_message'] = "Veuillez saisir un message valide";
        }
    }else {
        $error['reservation_message'] = "veuillez saisir votre message";
    }
    var_dump($error);
    if (empty($error)){
        var_dump('testd');
        if (isset($_POST['submit'])){
            var_dump('test');
            $adverts->createAdvert();
        }elseif (isset($_POST['edit'])){
            $adverts->id = $_GET['id'];
            $updateresult = $adverts->updateAdvert();
            if ($updateresult){
                header('location: accueil.php');
            }
        }
    }
}

if(isset($_GET['update'])){
    $adverts->id = $_GET['id'];
    $adverts = $adverts->getAdvertsById();
   
}
