<?php
     include_once("connexion.php");
     $bdd=$pdo = new connect();


     $recupMessage=$bdd->query=('SELECT * FROM forum');
     while($message=$recupMessage->fetch()){
       ?>
                <div class="message">
                    <h4><?=$message['pseudo'];?></h4>
                    <p><?=$message['messages'];?></p>
                </div>
        
       <?php 
     }
?>