<?php
include_once("main.php");
if(!empty($_GET["id"])){
    $query="delete from poubelles where idPoubelle=:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["id"]]);
    $objstmt->closeCursor();
    header("Location:poubelles.php");
}  
?>