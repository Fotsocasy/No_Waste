<?php
    include_once("connexion.php");
    session_start();
    $bdd=$pdo = new connect();
    if(isset($_POST['envoi'])){
        if(!empty($_POST['login']) AND !empty($_POST['password'])){
            $login=htmlspecialchars($_POST['login']);
            $password=htmlspecialchars($_POST['password']);

            $recupAdmin=$bdd->prepare('SELECT * FROM admin WHERE login=? AND mdp=?');
            $recupAdmin->execute(array($login,$password));

            if($recupAdmin->rowCount()>0){
                $_SESSION['login']=$login;
                $_SESSION['password']=$password;
                $_SESSION['id'] =$recupAdmin->fetch()['idAdmin'];
                $_SESSION['nom']=$recupAdmin->fetch()['nom'];
                header('location: dashboard.php');
            }else{
                echo "Votre mot de passe ou votre login est incorrect";
            }
        }else{
            echo "Veuillez completer tout les champs...";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Nunito:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css\connexionUserEtAdmin.css">
    <title>Connexion</title>
</head>
<body>
    
   <section id="inscription"  >
  
    <div class="container inscription col-lg-4 mx-auto col-12">
        
        <form action="" method="POST" class="form" id="form">
            <div class="container col-lg-4 mx-auto text-center mt-4 mb-3">
            <img src="img\logo.jpg" alt="" width="100px"> 
            </div>
            <div class="form-group">
                <label  for="login" class="p-text">Login</label>
                <input type="login" class="form-control input-login" name="login" id="login" placeholder="Enter your login">
                 
            </div>
            <div class="form-group">
                <label for="password" class="p-text">Password</label>
                <input type="password" class="form-control input-password" name="password" id="password" placeholder="Enter your password">
                 
            </div>
        
            <div class="form-group">
                <button type="submit" name="envoi" class="submit-inscription">Connexion</button>
            </div>
        </form>
    </div>

   </section>

    
    <!-- fichiers de js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>