<?php
header("Content-type: application/json; charset=utf-8");
try {
  $dns = 'mysql:host=localhost;dbname=jardin';
  $utilisateur = 'root';
  $motDePasse = ''; 
  $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  $connexion->exec('SET NAMES utf8');
} catch (Exception $e) {
  echo "Connexion à MySQL impossible : ", $e->getMessage();
  die();
}
$select = $connexion->query("SELECT * FROM produits");
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));
print_r ($produits);
?>
