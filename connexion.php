<?php 
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
?>