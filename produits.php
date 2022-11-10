<?php
header("Content-type: application/json; charset=utf-8");
include("connexion.php");
$select = $connexion->query("SELECT * FROM produits");
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));
print_r ($produits);
?>