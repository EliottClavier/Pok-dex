<?php

require('components/header.php');

$contents = getTable('*','pokemons');

// $categories = getTable('COLUMN_NAME','INFORMATION_SCHEMA.COLUMNS', 'TABLE_NAME','pokemons');

$categories = array(
    'pok_type' => 'Type',
    'pok_height' => 'Taille',
    'pok_weight' => 'Poids',
    'pok_hp' => 'HP',
    'pok_att' => 'Attaque',
    'pok_def' => 'Défense',
    'pok_att_spe' => 'Attaque SPÉ',
    'pok_def_spe' => 'Défense SPÉ',
    'pok_speed' => 'Vitesse',
);

if (isset($_GET['id']) && $_GET['id'] && is_numeric($_GET['id'])) {
    // Si ma variable existe, elle est définie, est moins grande que la longueur du tableau et est numérique

    $id = $_GET['id'];
    $pokemonSelected = getTable('*','pokemons','id', $id);

    if ($id == '1') {

        $btnLast = 'visibility : hidden;';

    } else {

        $btnLast = '';

    }

    if ($id == '151') {

        $btnNext = 'visibility : hidden;';

    } else {

        $btnNext = '';

    }

} else {

    header("Location: index.php"); // Renvoie sur cette page

}

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<head>

    <title> <?= '#'. $pokemonSelected['id'] . ' - ' . $pokemonSelected['pok_name']; ?> </title>

</head>

<body class="bg-dark">

<div class="container">

    <div class="row col-md-12 well justify-content-around">

        <div class="card text-white bg-black">
            <div class="card-header">
                <h1 class="text-center text-light font-weight-bold"> <?= '#'. $pokemonSelected['id'] . ' - ' . $pokemonSelected['pok_name']; ?> </h1>
            </div>
            <div class="card-image">
                <img class="m-5 img-fluid" id="img_comparateur" src="<?= $pokemonSelected['pok_img_shiny_url'] ?>" alt="Image de <?= $pokemonSelected['pok_name'] ?>">
            </div>
        </div>

            <!-- Liste contenant le type, les HP et la description du Pokémon -->

        <div class="card text-white" style="width: 40%">

            <ul class="list-group list-group-flush">

                <?php foreach ($categories as $key => $category) { ?>

                <li class="list-group-item bg-black text-center">
                    <h5><?= str_replace($key,$category,$category) . ' : '?> <span class="badge badge-danger"> <?= $pokemonSelected[$key] ?> </span></h5>
                </li>

                <?php } ?>

            </ul>

        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-4 text-center">

                    <!-- Afficher le bouton "Pokémon précedent" sauf pour le premier Pokémon -->

                    <a class="<?= $btnLast ?> btn btn-danger" style="font-size: 25px; <?= $btnLast ?>" href=pokedex_fiche.php?id=<?= $pokemonSelected['id'] - 1 ?>>
                        <?= $contents[$id - 2]['pok_name']; ?>
                    </a>

                </div>

                <!-- Bouton retour vers la liste des Pokémons -->
                <div class="col-4 text-center">

                    <a href="index.php"> <button style="font-size: 25px" class="btn btn-danger" type="button"> Retour </button> </a>

                </div>

                <div class="col-4 text-center">

                    <!-- Afficher le bouton "Pokémon suivant" sauf pour le dernier Pokémon -->

                    <a class="<?= $btnNext ?> btn btn-danger" style="font-size: 25px; <?= $btnNext ?>" href=pokedex_fiche.php?id=<?= $pokemonSelected['id'] + 1 ?>>
                        <?= $contents[$id]['pok_name']; ?>
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>
</div>
</body>