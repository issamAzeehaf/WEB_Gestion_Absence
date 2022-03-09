<?php
include("cnx.php");
session_start();

$idprof = $_SESSION['log'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userId']) && !empty($_POST['userId'])) {
        $user = $_POST['userId'];
        $matiere = $_POST['matiere'];
        $date = $_POST['date'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];
          $sql1 = "insert into listeabs (date,heureDeb,heureFin,matiere) values ('$date','$heure_debut','$heure_fin','$matiere')";
          $result1 = mysqli_query($dbcnx,$sql1);
            if(!$result1){
              echo "erreur";
            }else{
                echo "hahaha";
            }
            $sql2 = "select max(idAbs) from listeabs";
            $result2 = mysqli_query($dbcnx,$sql2);
            if($result2){
                $enr = mysqli_fetch_array($result2);
                $idAbs=$enr[0];
                $sql3 = "insert into absenter(idEtu,idAbs) values ($user,$idAbs)";
                $result3 = mysqli_query($dbcnx,$sql3);
                $sql4 = "insert into remplir(idUser,idAbs) value ($idprof,$idAbs)";
                $result4 = mysqli_query($dbcnx,$sql4);
            }
            $sql5 = "select idEtu,emailEtu from etudiant where idEtu=$user";
            $result5 = mysqli_query($dbcnx,$sql5);

            $sql6 = "select idUser,login from professeur where idUser = $idprof";
            $result6 = mysqli_query($dbcnx,$sql6);
            if($result5 && $result6){
              $enregistrement = mysqli_fetch_array($result5);
              $enregistrement2 = mysqli_fetch_array($result6);
              system("python send_mail.py -e ".$enregistrement['emailEtu']." -p ".$enregistrement2['login']." -m ".$matiere." -d '".$date."' -t '".$heure_debut."__".$heure_fin."'");
            }
      }
      if (isset($_POST['users']) && !empty($_POST['users'])) {
          $users = $_POST['users'];
          $matiere = $_POST['matiere'];
          $date = $_POST['date'];
          $heure_debut = $_POST['heure_debut'];
          $heure_fin = $_POST['heure_fin'];
          $tab = explode(',',$users);

          if (isset($users)){
                  for($i=0;$i<count($tab);$i++){
                    $query = "insert into listeabs(date,heureDeb,heureFin,matiere) values ('$date','$heure_debut','$heure_fin','$matiere')";
                    $resultat = mysqli_query($dbcnx,$query);
                    if(!$resultat){
                      echo "erreur";
                    }
                    $query2 = "select max(idAbs) from listeabs";
                    $resultat2 = mysqli_query($dbcnx,$query2);
                    if($resultat2){
                        $enr1 = mysqli_fetch_array($resultat2);
                        $idAbss=$enr1[0];
                        $query3 = "insert into absenter(idEtu,idAbs) values (".$tab[$i].",$idAbss)";
                        $resultat3 = mysqli_query($dbcnx,$query3);

                        $query4 = "insert into remplir(idUser,idAbs) value ($idprof,$idAbss)";
                        $resultat4 = mysqli_query($dbcnx,$query4);
                    }
                    $user = $tab[$i];
                    $query5 = "select idEtu,emailEtu from etudiant where idEtu=$user";
                    $resultat5 = mysqli_query($dbcnx,$query5);
                    
                    $query6 = "select idUser,login from professeur where idUser = $idprof";
                    $resultat6 = mysqli_query($dbcnx,$query6);
                    if ($resultat5 && $resultat6){
                      while($enregistrement3 = mysqli_fetch_array($resultat5) && $enregistrement4 = mysqli_fetch_array($resultat6)){

                        system("python send_mail.py -e ".$enregistrement['emailEtu']." -p ".$enregistrement2['login']." -m ".$matiere." -d '".$date."' -t '".$heure_debut."__".$heure_fin."'");
                    }

                  }
              }
          }
  }
}




// Drari write Here the code to create new absence in Database....

?>
