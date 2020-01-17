<?php

require('components/header.php');

// INNER JOIN pour rajouter la table des types /!\ Rajouter ORDER BY pour pouvoir ranger par l'id de pokemons et non l'id de pok_type

$contents = getTableJoin('p.*, pt.typ_name, pt.id AS id_type','pokemons p'," poke_type pt","p.pok_type = pt.id", "id");

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

if (isset($_POST['Pok_1']) && (isset($_POST['Pok_2']))) {
    $Pok_1 = $contents[$_POST['Pok_1']];
    $Pok_2 = $contents[$_POST['Pok_2']];
} else {

    $Pok_1 = $contents[0];
    $Pok_2 = $contents[0];

}


?>

<body class="bg-dark">

<div class="container">

    <div class="row justify-content-center">

        <form class="form-inline" name="form1" method="post" action="pokedex_comparateur.php">

            <select class="form-control m-3" name="Pok_1">

                <option value="" disabled selected> Choisir un pokémon </option>

                <?php foreach ($contents as $content) { ?>

                <option value="<?= $content['id'] - 1; ?>">

                    <?= '#' . $content['id'] . ' ' . $content['pok_name']; } ?>

                </option>

            </select>

            <input class="btn btn-danger" name="submit" type="Submit" value="Comparer">

            <select class="form-control m-3" name="Pok_2">

                <option value="" disabled selected> Choisir un pokémon </option>

                <?php foreach ($contents as $content) { ?>

                <option value="<?= $content['id'] - 1; ?>">

                    <?= '#' . $content['id'] . ' ' . $content['pok_name']; } ?>

                </option>

            </select>



    </div>
    </form>

</div>

<div class="container mt-3">

    <div class="row align-items-center justify-content-around text-center">

            <div class="card text-white bg-black" style="max-width: 18rem;">
                <div class="card-header">
                    <h3> <?= $Pok_1['pok_name']?> </h3>
                </div>

                <div class="card-image m-5">
                    <img class= "img-fluid" id="img_comparateur" src="<?= $Pok_1['pok_img_shiny_url'] ?>" alt="Image de <?= $Pok_1['pok_name'] ?>">
                </div>

                <div class="card-header">
                    <h3>
                        <a class="btn btn-danger" href=pokedex_fiche.php?id=<?= $Pok_1['id']; ?>>
                            <?= 'Fiche ' . $Pok_1['pok_name']; ?>
                        </a>
                    </h3>
                </div>
            </div>


        <div class="bg-black col-4">

            <table class="table table-striped table-dark table-black text-center">

                <tbody>

                <?php foreach ($categories as $keys => $category) { ?>

                    <tr class="row" style="border: 0.25px solid snow;">

                        <td class="col-4" id="<?= 'Pok_1' . $keys ?>">
                            <h5>

                                <?php

                                if ($keys === 'pok_type') { // Afficher le type pris dans la table type construite avec la fonction getTableJoin()

                                    echo $Pok_1['typ_name'];

                                } else {

                                    echo $Pok_1[$keys];

                                } ?>

                            </h5>
                        </td>

                        <th class="col-4 text-center" scope="row">

                            <h5>
                                <span class="badge badge-danger">
                                    <?= str_replace('_', ' ', $category);  ?>
                                </span>
                            </h5>
                            <!--
                            str_replace() = remplace le caractère choisi par un autre, ici on veut supprimer les _ pour certaines appélations de lignes dans les tableaux
                            strtoupper() = toutes les lettres
                            ucfirst() = met la première lettre en majuscule
                            -->

                        </th>

                        <td class="col-4" id="<?= 'Pok_2' . $keys ?>">
                            <h5>
                                <?php
                                if ($keys === 'pok_type') {

                                    echo $Pok_2['typ_name'];

                                } else {

                                    echo $Pok_2[$keys];

                                } ?>
                            </h5>
                        </td>

                    </tr>

                    <?php

                    if ($keys === 'pok_type') {

                        $a = (string) $Pok_1[$keys];
                        $b = (string) $Pok_2[$keys];

                    } else {

                        $a = (float) $Pok_1[$keys];
                        $b = (float) $Pok_2[$keys];

                    }

                    comparaison($a,$b,$keys);  }

                    ?>

                </tbody>

            </table>

        </div>

            <div class="card text-white bg-black" style="max-width: 18rem;">
                <div class="card-header">
                    <h3> <?= $Pok_2['pok_name']?> </h3>
                </div>

                <div class="card-image m-5">
                    <img class="img-fluid" id="img_comparateur" src="<?= $Pok_2['pok_img_shiny_url'] ?>" alt="Image de <?= $Pok_2['pok_name'] ?>">
                </div>

                <div class="card-header">
                    <h3>
                        <a class="btn btn-danger" href=pokedex_fiche.php?id=<?= $Pok_2['id']; ?>>
                            <?= 'Fiche ' . $Pok_2['pok_name']; ?>
                        </a>
                    </h3>
                </div>
            </div>

    </div>

</body>
