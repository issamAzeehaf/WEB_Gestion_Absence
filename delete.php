
<?php
include("cnx.php");
session_start();
    if(!isset($_SESSION['log'])){
        header("location:login.php");
    }
$id=$_GET['id'];
$idf=$_GET['f'];
?>
<?php
        $id = $_GET['id'];
    echo "haha";
        $deleteEtu = "delete from etudiant where idEtu='$id'";
        $dbcnx->query($deleteEtu);

        header("location:class.php?f=$idf");


?>