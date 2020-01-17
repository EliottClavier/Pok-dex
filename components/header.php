<!-- Base du header -->

<?php

include "database.php";
include "functions.php";

if (isset($_POST['search'])) {

    // $search = $_POST['search'];
    $search = 'bul';
    $searchResult = getTableSearch("*","pokemons","pok_name",$search .'%');
    echo $searchResult;

} else {

    $search = null;

}

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link rel="shortcut icon" type="image/x-icon" href="images/Pokeball.ico" />

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/styles.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body>

<!-- Base de la navbar -->

<nav style="font-size: large" class="navbar navbar-expand-sm bg-dark navbar-dark">
    <span class="navbar-brand mb-0 h1"> Pokédex </span>
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> Menu <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pokedex_comparateur.php"> Comparateur </a>
            </li>
        </ul>
    </div>

    <form method="post" class="form-inline">

        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i> </button>
        <!-- Logo intégré avec FontAwesome -->

    </form>

</nav>

</body>
</html>