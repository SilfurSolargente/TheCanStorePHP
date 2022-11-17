<?php
// header("Content-type: application/json; charset=utf-8");
// On se  connecte, voir cours
include("connexion.php");
//base de la requete
$valeur = array( '0'=> "tous", '1'=> "legumes", '2'=> "soupe", '3'=> "viande" );
$requete = "SELECT * FROM produits WHERE 1+1 ";
if (!isset($_POST['categorie'])){
    $_POST['categorie'] = 0;
}
if (!isset($_POST['nutri'])){
    $_POST['nutri'] = 0;
}
if (!isset($_POST['searchTerm'])){
    $_POST['searchTerm'] = '';
}
// si une categorie choisie trier
if ($_POST['categorie']!='0')
{
    $requete .= " AND  type = '".$valeur[$_POST['categorie']]."'";
}
if($_POST['nutri']!='0')
{
    $requete .= " AND  nutriscore = '".$_POST['nutri']."'";
}
if($_POST['searchTerm']!='')
{
    $requete .= " AND nom LIKE '%".$_POST['searchTerm']."%'";
}
// Envoi de la requête vers MySQL
$select = $connexion->query($requete);
//recu sous forme d'un seul tableau et transformation en Json
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));
// affichage du Json
print_r ($produits);
?>