<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Can Store</title>
  <link href="https://fonts.googleapis.com/css?family=Cherry+Swash|Raleway" rel="stylesheet">
  <link href="can-style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<?php
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
$select->setFetchMode(PDO::FETCH_OBJ)
?>
<body>
  
</body>
</html>

<body>
  <nav class="navbar" style="background-color: #7851a9">
    <div class="container-fluid">
      <a class="navbar-brand">
        <img src="icons/silfur.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top"> Le jardin en boite de Silfur</a>
      <form name="choix" method="POST">
        <div>
          <label for="categorie">Choisissez une categorie :</label>
          <select name="categorie">
            <option <?php if($_POST['categorie']==0) echo "selected";?> value="0">Toutes</option>
            <option <?php if($_POST['categorie']==1) echo "selected";?> value="1">Légumes</option>
            <option <?php if($_POST['categorie']==2) echo "selected";?> value="2">Soupes</option>
            <option <?php if($_POST['categorie']==3) echo "selected";?> value="3">Viandes</option>
          </select>
          
          <label for="nutri">Choisissez un nutri-score :</label>
          <select name="nutri">
            <option <?php if($_POST['nutri']==0) echo "selected";?> value="0">Tous</option>
            <option <?php if($_POST['nutri']=='A') echo "selected";?> value="A">A</option>
            <option <?php if($_POST['nutri']=='B') echo "selected";?> value="B">B</option>
            <option <?php if($_POST['nutri']=='C') echo "selected";?> value="C">C</option>
            <option <?php if($_POST['nutri']=='D') echo "selected";?> value="D">D</option>
            <option <?php if($_POST['nutri']=='E') echo "selected";?> value="E">E</option>
            <option <?php if($_POST['nutri']=='F') echo "selected";?> value="F">F</option>
          </select>
     
          <label for="searchTerm">Entrez une recherche :</label>
          <input type="text" name="searchTerm" id="searchTerm" autocomplete="off" list="listeValeurs" placeholder="Soupe de carottes">
          <datalist id="listeValeurs">
          </datalist>
      
          <button id="btnReset">Réinitialiser</button>
          <button type="button" class="btn btn-primary position-relative">
            Panier
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="panier">
              0
              <span class="visually-hidden">unread messages</span>
            </span>
          </button>
        </div>
      </form>
    </div>
  </nav>
  <div class="container mt-5">
    <main class="row cols-8 row-cols-md-5 g-4">
    <?php while($enregistrement = $select ->fetch()) { ?>
      <div class="cadre">
        <div class ="card text-center border-secondary text-secondary bg-dark h4 mb-4" style="--bs-bg-opacity: .9;">
          <div class="card-title"><?php echo $enregistrement ->nom;?></div>
          <img class="card-img-top" src="images/<?php echo $enregistrement ->image;?>" alt="<?php echo $enregistrement ->nom;?>">
            <div class="card-footer text-muted"></div>
            <p class="para text-danger"><?php echo $enregistrement ->prix;?></p><span class="nutri text-primary fs-6 h3"><?php echo $enregistrement ->nutriscore;?></span>
            
            <button class="btn btn-outline-secondary fs-5" onclick="ajouterPanier()"> Ajouter au Panier </button>
          </div>
        </div>
      <?php } ?>
    </main>
    </div>
  
  <footer class="container">
    <?php 
    if(isset($_COOKIE['test'])){
      echo 'Votre N de COOKIE enregistré est le ' .$_COOKIE['test'];
      setcookie('test', 'C124', time() + 60*60*24, null, null, false, true);
      // echo '<BR>Votre ID de SESSION enregistré est le ' .$_COOKIE['PHPSESSID'];
    }
    else{
      setcookie('test', 'C123', time() + 60*60*24);
    }
    ?>
  </footer>
  <script src="can-script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</body>

</html>