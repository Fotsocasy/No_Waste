<?php
    $chauffeurs=true;
    
    include_once("main.php");
    
    if(!empty($_POST)){
      $query="update chauffeurs set nom=:nom, email=:email, ville=:ville, quartier=:quartier, telephone=:telephone, loginChauffeur=:login, password=:password where idChauffeur=:id";
      $pdostmt=$pdo->prepare($query);
      $pdostmt->execute(["nom"=>$_POST["inputNom"],"email"=>$_POST["inputEmail"], "ville"=>$_POST["inputVille"],"quartier"=>$_POST["inputQuartier"],"telephone"=>$_POST["inputTelephone"],"login"=>$_POST["inputLogin"],"password"=>$_POST["inputPassword"],"id"=>$_POST["myid"]]);
      $pdostmt->closeCursor();
      header("location:chauffeurs.php");
    }
    include_once("headers.php");

    if(!empty($_GET["id"])) {
      $query="select * from chauffeurs where idChauffeur=:id";
      $pdostmt=$pdo->prepare($query);
      $pdostmt->execute(["id"=>$_GET['id']]);
      while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
    ?>
    <h1 class="mt-5" data-aos="zoom-in-down">Modifier un chauffeur</h1>

<form  data-aos="zoom-in-down" class="row g-3 mt-5" method="POST">
  <input type="hidden" name="myid" value="<?php echo $row["idChauffeur"];?>">
  <div class="col-md-6">
    <label for="inputNom" class="form-label">Nom</label>
    <input name="inputNom" type="text" class="form-control" id="inputNom" value="<?php echo $row["nom"];?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input name="inputEmail" type="text" class="form-control" id="inputEmail"  value="<?php echo $row["email"];?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputVille" class="form-label">Ville</label>
    <input name="inputVille" type="text" class="form-control" id="inputVille"  value="<?php echo $row["ville"];?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputQuartier" class="form-label">Quartier</label>
    <input name="inputQuartier" type="text" class="form-control" id="inputQuartier"  value="<?php echo $row["quartier"];?>" required>
  </div>
  <div class="col-6">
    <label for="inputTelephone" class="form-label">Telephone</label>
    <input class="form-control" type="tel" name="inputTelephone" id="inputTelephone"  value="<?php echo $row["telephone"];?>" required>
  </div>
  <div class="col-6">
    <label for="inputLogin" class="form-label">Login</label>
    <input class="form-control" type="text" name="inputLogin" id="inputLogin"  value="<?php echo $row["loginChauffeur"];?>" required>
  </div>
  <div class="col-6">
    <label for="inputPassword" class="form-label">Password</label>
    <input class="form-control" type="password" name="inputPassword" id="inputPassword"  value="<?php echo $row["password"];?>" required>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form>
</div>
</main>
     
<?php
  endWhile;
  $pdostmt->closeCursor();
  }


  

?>

<?php
    include_once("footer.php");
?> 