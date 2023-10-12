
<?php session_start(); ?>
    
  <?php
    $information=true;
    include_once("headerUser.php");
    include_once("main.php");
    $count=0;
  ?>

  <h1 data-aos="zoom-in-up" class="mt-5">Bienvenu <?php echo($_SESSION['loginChauffeur']);?></h1>
    <main>
    <div data-aos="zoom-in-down" class="container">
        <h1 class="mt-5">Historique des Poubelles</h1>
        <?php
            $query="select * from poubelles";
            $pdostml=$pdo->prepare($query);
            $pdostml->execute();
            // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));
        ?>

        <!-- <div class="row mt-4 mb-5">
            <div class="col-lg-4">
                <p>
                Ici vous trouverez l'historique de l'activite de tous les bacs a ordure du systeme. prenez le temps de les consulter de temps en temps. Vous retrouverez le <b>Quartier</b>, la <b>description</b>, le <b>niveau de remplissage</b> de chaque poubelle dans l'historique. <br>
                En cas d'oublie consulter la message personnel pour voir quelle poubelle vous est attribuee.

                </p>
            </div>
            <div class="col-lg-4">
                <p>Vous avez egalement la possibilite d'aller sur place pour verifier l'etat de chaque poubelle lorsque vous constaterez que le niveau est elevee dans l'historique. EN cas de probleme contactez simplement l'administrateur du systeme dans l'onglet support et il vous redirigera et vous mettra sur le droit chemin..</p>
            </div>
        </div> -->


        <table id="dataTable" class="display mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>VILLE</th>
                <th>QUARTIER</th>
                <th>DESCRIPTION</th>
                <th>NIVEAU</th>
            </tr>
        </thead>
        <tbody>
            <?php while($ligne=$pdostml->fetch(PDO::FETCH_ASSOC)):
                $count++;    
            ?>
            <tr>
                <td><?php echo $ligne["idPoubelle"];?></td>
                <td><?php echo $ligne["ville"];?></td>
                <td><?php echo $ligne["quartier"];?></td>
                <td><?php echo $ligne["description"];?></td>
                <td><?php echo $ligne["niveau"]."%";?></td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
    </div>
    
      
    </main>




    <?php include_once("footer.php");?>


