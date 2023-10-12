<?php 
    $poubelles=true;
    include_once("headers.php");
    include_once("main.php");

    $count=0;
  ?>
 
    
    <main>
        <div data-aos="zoom-in-down" class="container">
        <h1 class="mt-5">Poubelles</h1>
        <a href="addPoubelle.php" class="btn btn-info" style="float: right;margin-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
        </a>
        <?php
            $query="select * from poubelles";
            $pdostml=$pdo->prepare($query);
            $pdostml->execute();
            // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));


        ?>
        <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>VILLE</th>
                <th>QUARTIER</th>
                <th>DESCRIPTION</th>
                <th>NIVEAU</th>
                <th>ACTION</th>
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
                <td>
                   
                    <a href="deletePoubelle.php?id=<?php echo $ligne["idPoubelle"]?>" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </a>  
                </td>
            </tr>
            
            <!-- Modal -->
            <!-- <div class="modal fade" id="deleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Suppression</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer cette poubelle de la liste?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a href="deletePoubelle.php?id=<php echo $ligne["idPoubelle"]?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div> -->
            <?php endwhile;?>
        </tbody>
    </table>
    </div>
</main>


<?php include_once("footer.php");?>


