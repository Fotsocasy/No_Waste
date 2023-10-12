<?php
    $client=true;
   
    include_once("main.php");
    
    if(!empty($_POST["inputVille"])&& !empty($_POST["inputQuartier"])&& !empty($_POST["inputNiveau"])&& !empty($_POST["inputDescription"])){
        $query="insert into poubelles(ville,quartier,niveau,description) values (:ville,:quartier,:niveau,:description)";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute(["ville"=>$_POST["inputVille"],"quartier"=>$_POST["inputQuartier"],"niveau"=>$_POST["inputNiveau"],"description"=>$_POST["inputDescription"]]);
        $pdostmt->closeCursor();
        header("Location:poubelles.php"); 
    }
    include_once("headers.php");
?>

<h1 data-aos="zoom-in-down" class="mt-5">Ajouter une poubelle</h1>

<form data-aos="zoom-in-down" class="row g-3 mt-5" method="POST">
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Ville</label>
    <input name="inputVille" type="text" class="form-control" id="inputVille" required>
  </div>
  <div class="col-md-4">
    <label for="inputQuartier" class="form-label">Quartier</label>
    <input name="inputQuartier" type="text" class="form-control" id="inputQuartier" required>
  </div>
  <div class="col-md-2">
    <label for="inputNiveau" class="form-label">Niveau actuel</label>
    <input name="inputNiveau" type="text" class="form-control" id="inputNiveau">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea class="form-control" name="inputDescription" id="inputDescription" cols="20" rows="5"></textarea required>
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