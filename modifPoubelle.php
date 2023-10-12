<?php
    $client=true;
    include_once("headers.php");
    include_once("main.php");
    
    if(!empty($_GET["id"])){
        $query="select * from client where idPoubelle=:id";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute(["idPoubelle"=>$_GET["id"]]);
        while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
?>

<h1 class="mt-5">Modifier les informations d'une poubelle</h1>  

<form class="row g-3 mt-5" method="POST">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Ville</label>
    <input name="inputVille" type="text" class="form-control" id="inputVille" value=<?php echo $row["ville"]?> required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Quartier</label>
    <input name="inputQuartier" type="text" class="form-control" id="inputQuartier" value=<?php echo $row["quartier"]?> required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea class="form-control" name="inputDescription" id="inputDescription" cols="20" rows="5" value=<?php echo $row["description"]?> required></textarea>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form>

</main>


<?php
    // $pdostmt->closeCursor();
    // header("Location:clients.php"); 
    endwhile;
    }
?>


<?php
    include_once("footer.php");
?>