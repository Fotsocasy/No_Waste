<?php 
    $chauffeurs=true;
    include_once("headers.php");
    include_once("main.php");
    $count=0;
?>

<main>
        <div data-aos="zoom-in-down" class="container">
        <h1 class="mt-5" data-aos="zoom-in-down">Chauffeurs</h1>
        <a href="addChauffeur.php" class="btn btn-info" style="float: right;margin-bottom: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
        </svg>
        </a>
        <?php
            $query="select * from chauffeurs";
            $pdostml=$pdo->prepare($query);
            $pdostml->execute();
            // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));


        ?>
        <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>EMAIL</th>
                <th>VILLE</th>
                <th>QUARTIER</th>
                <th>TELEPHONE</th>
                <th>LOGIN</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php while($ligne=$pdostml->fetch(PDO::FETCH_ASSOC)):
                $count++;    
            ?>
            <tr>
                <td><?php echo $ligne["idChauffeur"];?></td>
                <td><?php echo $ligne["nom"];?></td>
                <td><?php echo $ligne["email"];?></td>
                <td><?php echo $ligne["ville"];?></td>
                <td><?php echo $ligne["quartier"];?></td>
                <td><?php echo $ligne["telephone"];?></td>
                <td><?php echo $ligne["loginChauffeur"];?></td>
                <td>
                    <a href="modifChauffeur.php?id=<?php echo $ligne["idChauffeur"]?>" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>  
                    <a href="deleteChauffeur.php?id=<?php echo $ligne["idChauffeur"]?>" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </a>  
                </td>
            </tr>
            
            <!-- Modal -->
            <!-- <div class="modal fade" id="deleteModal<?php echo $count?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Suppression</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer ce chauffeur de la liste?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a href="deleteChauffeur.php?id=<?php echo $ligne["idChauffeur"]?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div> -->
            <?php endwhile;?>
        </tbody>
    </table>
    </div>
</main>





<?php include_once("footer.php");?>


