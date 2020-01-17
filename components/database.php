<?php

// Voir la doc "New PDO PHP" pour plus d'informations sur la connection

function bddConnect() {

    $user = 'root';
    $password = '';

    $bdd = new PDO('mysql:host=localhost;dbname=bdd_pokemons',$user,$password);

    return $bdd;

}

function getTable($select, $table,$where = null,$value = null) {

    $bdd = bddConnect();

    if (($where != null) && ($value != null)) {

        $request = $bdd->query("SELECT " . $select . " FROM " . $table . " WHERE " . $where . "=" . $value);
        $result = $request->fetch();

    } else {

        $request = $bdd->query("SELECT " . $select . " FROM " . $table);
        $result = $request->fetchAll();

    }

    return $result;

}

// SELECT pok_type,typ_name FROM pokemons p JOIN poke_type pt ON pt.id = p.pok_type;

function getTableJoin($select, $table, $join, $link, $order) {

    $bdd = bddConnect();

    // $test = $bdd->query("SELECT " . "pok_type,typ_name" . " FROM " . "pokemons p" . " JOIN " . "poke_type pt" . " ON " . "pt.id = p.pok_type;");
    $request = $bdd->query("SELECT " . $select . " FROM " . $table . " INNER JOIN " . $join ." ON " . $link . " ORDER BY " . $order);
    $result = $request->fetchAll();

    return $result;
}

function getTableSearch($select, $table, $where, $like) {

    $bdd = bddConnect();

    // $test = $bdd->query("SELECT " . "pok_type,typ_name" . " FROM " . "pokemons p" . " JOIN " . "poke_type pt" . " ON " . "pt.id = p.pok_type;");
    $request = $bdd->query("SELECT " . $select . " FROM " . $table . " WHERE " . $where . " LIKE " . $like);
    die(var_dump($request));
    $result = $request->fetchAll();

    return $result;

}


?>
