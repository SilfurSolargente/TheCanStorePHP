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
<body>
  
</body>
</html>

<body>
  <nav class="navbar" style="background-color: #7851a9">
    <div class="container-fluid">
      <a class="navbar-brand">
        <img src="icons/silfur.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top"> Le jardin en boite de Silfur</a>
      <form name="choix">
        <div>
          <label for="categorie">Choisissez une categorie :</label>
          <select name="categorie">
            <option selected value="0">Toutes</option>
            <option value="1">Légumes</option>
            <option value="2">Soupes</option>
            <option value="3">Viandes</option>
          </select>
          
          <label for="nutri">Choisissez un nutri-score :</label>
          <select name="nutri">
            <option selected value="0">Tous</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
          </select>
     
          <label for="searchTerm">Entrez une recherche :</label>
          <input type="text" name="searchTerm" id="searchTerm" autocomplete="off" list="listeValeurs" placeholder="Soupe de carottes">
          <datalist id="listeValeurs">
          </datalist>
      
          <button>Réinitialiser</button>
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
  
    <main class="row row-cols-1 row-cols-md-4 g-4">

    </main>
  
  <footer class="container">
  </footer>
  <script src="can-script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</body>

</html>