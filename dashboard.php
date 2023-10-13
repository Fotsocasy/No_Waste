<?php session_start(); ?>

<?php
$index = true;
include_once("headers.php");
include_once("main.php");
$count = 0;
?>

<h1 data-aos="zoom-in-up" class="mt-5">Dashboard-Bienvenu <?php echo ($_SESSION['login']); ?></h1>
<main>

    <section data-aos="zoom-in-up" id="diagram" class="mt-5">
        <h1 data-aos="zoom-in-up" class="mt-5 mb-4">Activite <small style="font-size:14px">Etat des poubelles</small></h1>

        <?php
        $query = "select * from poubelles";
        $pdostml = $pdo->prepare($query);
        $pdostml->execute();
        // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));


        ?>
        <div class="container">
            <div class="row">
                <?php while ($ligne = $pdostml->fetch(PDO::FETCH_ASSOC)) :
                    $count++;
                ?>
                    <div class="col-lg-4 col-12 col-md-6  mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Poubelle <?php echo $ligne["idPoubelle"]; ?></h5>
                                <p class="card-text">Quartier: <b><?php echo $ligne["quartier"]; ?></b></p>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Activity</h6>

                                <div class="row mx-auto">
                                    <div class="col-lg-8 col-12 text-center">
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Etat</h6>
                                        <div class="progress" role="progressbar" aria-label="" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-danger" id="niveauDisplay"  style="width: 0%;">0 %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                    </div>
            </div>
        </div>

    </section>





    <div data-aos="zoom-in-down" class="container">


        <h1 data-aos="zoom-in-up" class="mt-5 mb-3">Chauffeurs</h1>
        <?php
        $query = "select * from chauffeurs";
        $pdostml = $pdo->prepare($query);
        $pdostml->execute();
        // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));


        ?>
        <table data-aos="zoom-in-up" id="dataTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>VILLE</th>
                    <th>QUARTIER</th>
                    <th>TELEPHONE</th>
                    <th>LOGIN</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ligne = $pdostml->fetch(PDO::FETCH_ASSOC)) :
                    $count++;
                ?>
                    <tr>
                        <td><?php echo $ligne["idChauffeur"]; ?></td>
                        <td><?php echo $ligne["nom"]; ?></td>
                        <td><?php echo $ligne["ville"]; ?></td>
                        <td><?php echo $ligne["quartier"]; ?></td>
                        <td><?php echo $ligne["telephone"]; ?></td>
                        <td><?php echo $ligne["loginChauffeur"]; ?></td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                    <a href="deleteChauffeur.php?id=<?php echo $ligne["idChauffeur"] ?>" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<main class="mb-5">
    <div data-aos="zoom-in-up" class="container">
        <h1 data-aos="zoom-in-up" class="mt-5 mb-3">Poubelles</h1>
        <?php
        $query = "select * from poubelles";
        $pdostml = $pdo->prepare($query);
        $pdostml->execute();
        // var_dump($pdostml->fetchAll(PDO::FETCH_ASSOC));
        ?>
        <table data-aos="zoom-in-up" id="dataTable2" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>VILLE</th>
                    <th>QUARTIER</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ligne = $pdostml->fetch(PDO::FETCH_ASSOC)) :
                    $count++;
                ?>
                    <tr>
                        <td><?php echo $ligne["idPoubelle"]; ?></td>
                        <td><?php echo $ligne["ville"]; ?></td>
                        <td><?php echo $ligne["quartier"]; ?></td>
                        <td><?php echo $ligne["description"]; ?></td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                    <a href="deletePoubelle.php?id=<?php echo $ligne["idPoubelle"] ?>" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function updateNiveau() {
    // Use jQuery to make an AJAX request
    $.get('http://172.20.10.3/live-data', function (data) {
      // Assuming the server returns a numeric value
      $('#niveauDisplay').text(data + " %");
      $('#niveauDisplay').css('width', data + "%"); // Update progress bar width
    });
  }

  // Call the updateNiveau function immediately when the page loads
  updateNiveau();

  // Call the updateNiveau function every 5 seconds (adjust the interval as needed)
  setInterval(updateNiveau, 5000);
</script>

