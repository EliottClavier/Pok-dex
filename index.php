<?php

    require('components/header.php');

    $id = 0;

    $contents = getTable('*','pokemons');

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<head>

    <title>Menu</title>

</head>

<body class="bg-secondary">

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">

                <h1 class="text-center text-light"> Liste des pokémons </h1>

            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-dark text-center">

                    <thead class="bg-danger">

                        <tr>

                            <th scope="col">#ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Image</th>
                            <th scope="col">Fiche</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($contents as $content) { ?>

                        <tr>

                            <th scope="row"> <?= $content['id'] ?> </th>

                            <!-- ?= fait pareil que echo (plus rapide) -->
                            <!-- Pour rentrer dans un tableau à l'intérieur d'un tableau, on utilise le double crochet -->

                            <td>
                                <?= $content['pok_name'] ?>
                            </td>

                            <td>
                                <img  class="img-fluid" src="<?= $content['pok_img_url'] ?>" alt="Illustrations pokémons">
                            </td>

                            <!-- la classe img-fuid peut aussi faire s'adapter les images à la taille du reste -->

                            <td>
                                <a class="btn btn-danger" href=pokedex_fiche.php?id=<?= $content['id']; ?>>
                                        <?= 'Fiche ' . $content['pok_name']; ?>
                                </a>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

