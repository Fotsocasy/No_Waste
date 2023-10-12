<?php
    $chauffeurs=true;
    
    include_once("main.php");
    
    if(!empty($_POST["inputNom"]) && !empty($_POST["inputEmail"]) && !empty($_POST["inputVille"]) && !empty($_POST["inputQuartier"]) && !empty($_POST["inputTelephone"]) && !empty($_POST["inputLogin"]) && !empty($_POST["inputPassword"])){
        $query="insert into chauffeurs(nom,email,ville,quartier,telephone,loginChauffeur,password) values (:nom,:email,:ville,:quartier,:telephone,:loginChauffeur,:password)";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute(["nom"=>$_POST["inputNom"],"email"=>$_POST["inputEmail"], "ville"=>$_POST["inputVille"],"quartier"=>$_POST["inputQuartier"],"telephone"=>$_POST["inputTelephone"],"loginChauffeur"=>$_POST["inputLogin"],"password"=>$_POST["inputPassword"]]);
        $pdostmt->closeCursor();
        header("location:chauffeurs.php");
    }
    include_once("headers.php");
?>

<h1 class="mt-5" data-aos="zoom-in-down">Ajouter un chauffeur</h1>

<form  data-aos="zoom-in-down" class="row g-3 mt-5" method="POST">
  <div class="col-md-6">
    <label for="inputNom" class="form-label">Nom</label>
    <input name="inputNom" type="text" class="form-control" id="inputNom" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input name="inputEmail" type="text" class="form-control" id="inputEmail" required>
  </div>
  <div class="col-md-6">
    <label for="inputVille" class="form-label">Ville</label>
    <input name="inputVille" type="text" class="form-control" id="inputVille" required>
  </div>
  <div class="col-md-6">
    <label for="inputQuartier" class="form-label">Quartier</label>
    <input name="inputQuartier" type="text" class="form-control" id="inputQuartier" required>
  </div>
  <div class="col-6">
    <label for="inputTelephone" class="form-label">Telephone</label>
    <input class="form-control" type="tel" name="inputTelephone" id="inputTelephone">
  </div>
  <div class="col-6">
    <label for="inputLogin" class="form-label">Login</label>
    <input class="form-control" type="text" name="inputLogin" id="inputLogin">
  </div>
  <div class="col-6">
    <label for="inputPassword" class="form-label">Password</label>
    <input class="form-control" type="password" name="inputPassword" id="inputPassword">
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>


</div>
</main>



<?php
    include_once("footer.php");
?>