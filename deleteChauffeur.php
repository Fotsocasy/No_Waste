<?php
include_once("main.php");
if(!empty($_GET["id"])){
    $query="delete from chauffeurs where idChauffeur=:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["id"]]);
    $objstmt->closeCursor();
    header("Location:chauffeurs.php");
}  
?>