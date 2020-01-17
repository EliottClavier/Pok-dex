<?php

// Fonction de comparaison qui change la couleur en fonction de la supériorité, de l'infériorité ou de la neutralité

function comparaison($a, $b,$keys) {

    if ((is_string($a) === true) && (is_string($b) === true)){

        return null;

    } elseif ($a > $b) {

        echo '<style>#Pok_1' . $keys . '{ color: #28a745;} </style>';
        echo '<style>#Pok_2' . $keys . '{ color: #dc3545;} </style>';

    } elseif ($a < $b) {

        echo '<style>#Pok_2' . $keys . '{ color: #28a745;} </style>';
        echo '<style>#Pok_1' . $keys . '{ color: #dc3545;} </style>';

    } else {

        echo '<style>#Pok_1' . $keys . '{ color: #007bff;} </style>';
        echo '<style>#Pok_2' . $keys . '{ color: #007bff;} </style>';

    }

}

/*  Fonction proposé en cours
function comparePokemons($pokemon1, $pokemon2) {

    $pokemon1HP = $pokemon1['pok_hp'];
    $pokemon1Weight = $pokemon1['pok_weight'];
    $pokemon1Height = $pokemon1['pok_height'];

    $pokemon2HP = $pokemon2['pok_hp'];
    $pokemon2Weight = $pokemon2['pok_weight'];
    $pokemon2Height = $pokemon2['pok_height'];

    if ($pokemon1HP > $pokemon2HP) {

        $compare['hp'] = $pokemon1HP . ' > ' . $pokemon2HP;

    } elseif ($pokemon1HP < $pokemon2HP) {

        $compare['hp'] = $pokemon1HP . ' < ' . $pokemon2HP;

    } else {

        $compare['hp'] = $pokemon1HP . ' = ' . $pokemon2HP;

    }

    if ($pokemon1Weight > $pokemon2Weight) {

        $compare['hp'] = $pokemon1Weight . ' > ' . $pokemon2Weight;

    } elseif ($pokemon1Weight < $pokemon2Weight) {

        $compare['hp'] = $pokemon1Weight . ' < ' . $pokemon2Weight;

    } else {

        $compare['hp'] = $pokemon1Weight . ' < ' . $pokemon2Weight;

    }

    if ($pokemon1Height > $pokemon2Height) {

        $compare['hp'] = $pokemon1Height . ' > ' . $pokemon2Height;

    } elseif ($pokemon1Height < $pokemon2Height) {

        $compare['hp'] = $pokemon1Height . ' < ' . $pokemon2Height;

    } else {

        $compare['hp'] = $pokemon1Height . ' < ' . $pokemon2Height;

    }

    return $compare;
}

*/
?>