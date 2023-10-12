<?php
    $messagerie=true;
    include_once("headers.php");
    include_once("main.php");
     include_once("connexion.php");
     $bdd=$pdo = new connect();
     if(isset($_POST["valider"])){
        if((!empty($_POST['pseudo'])) AND (!empty($_POST['message']))){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $message=nl2br(htmlspecialchars($_POST['message']));

            $inserMessage= $bdd-> prepare('INSERT INTO forum(pseudo, messages) VALUES(?, ?)');
            $inserMessage->execute(array($pseudo,$message));
        }else{
            echo "Remplissez tout les champs...";
        }
     }
    ?>
    
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="form-group">
            <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="submit" class="form-control" name="valider">
    </form>

    <section id="listeMessage"></section>


<?php
    include_once("footer.php");
?>