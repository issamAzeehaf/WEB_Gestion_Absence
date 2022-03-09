<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!-<![endif]-->
<?php
include("cnx.php");
?>
<?php
session_start();
    if(!isset($_SESSION['log'])){
        header("location:login.php");
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List of Absence</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="gnavbar">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="index.php"><img class="hidden lg:block h-8" height="10%"
                            src="imgs/school_128.png"
                            alt="Workflow" >
                        </a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="index.php" class="hgr text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto">
        <div class="container mt-6">
            <h1 class="text-xl font-semibold text-center mb-8"><span># List of Absence : </span></h1>
            <?php
            $sql ="select idEtu,nomEtu,prenomEtu,telEtu,emailEtu from etudiant";
            $resultat=mysqli_query($dbcnx,$sql);
            if($resultat){
              echo '<div class='.'"container px-80 items-center justify-center"'.'>';
              echo '<div class='.'"-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto"'.'>';
              echo '<div class='.'"inline-block min-w-full shadow rounded-lg overflow-hidden"'.'>';
              echo '<table class='.'"min-w-full leading-normal"'.'>';
              echo '<thead>';
              echo '<tr>';
              echo '<th class='.'"px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"'.'>'.'Full name'.'</th>';
              echo '<th class='.'"px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"'.'>'.'Email'.'</th>';
              echo '<th class='.'"px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"'.'>'.'Telephone'.'</th>';
              echo '<th class='.'"px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"'.'>'.'Date'.'</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
              while($enr=mysqli_fetch_array($resultat)){
                $idetu = $enr['idEtu'];
                $sql2 = "select * from absenter where idEtu=$idetu";
                $result2 = mysqli_query($dbcnx,$sql2);
                if($result2){
                  while($enr2 = mysqli_fetch_array($result2)){
                    $idabs = $enr2['idAbs'];
                    $sql3 = "select idAbs,date from listeabs where idAbs=$idabs";
                    $result3=mysqli_query($dbcnx,$sql3);
                      if($result3){
                        while($enr3=mysqli_fetch_array($result3)){

                          echo '<tr>';
                          echo '<td class='.'"px-5 py-5 border-b border-gray-200 bg-white text-sm"'.'>';
                          echo '<div class='.'"flex items-center"'.'>';
                          echo '<div class='.'"ml-3"'.'>';
                          echo '<p class='.'"text-gray-900 whitespace-no-wrap"'.'>'.$enr['nomEtu'].' '.$enr['prenomEtu'].'</p>';
                          echo '</div>';
                          echo '</div>';
                          echo '</td>';
                          echo '<td class='.'"px-5 py-5 border-b border-gray-200 bg-white text-sm"'.'>';
                          echo '<p class='.'"text-gray-900 whitespace-no-wrap"'.'>'.$enr['emailEtu'].'</p>';
                          echo '</td>';
                          echo '<td class='.'"px-5 py-5 border-b border-gray-200 bg-white text-sm"'.'>';
                          echo '<p class='.'"text-gray-900 whitespace-no-wrap"'.'>'.$enr['telEtu'].'</p>';
                          echo '</td>';
                          echo '</td>';
                          echo '<td class='.'"px-5 py-5 border-b border-gray-200 bg-white text-sm"'.'>';
                          echo '<p class='.'"text-gray-900 whitespace-no-wrap"'.'>'.$enr3['date'].'</p>';
                          echo '</td>';
                          echo '</tr>';


                        }

                      }
                }
              }
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }

             ?>





                                </tr>



                </div>

            </div>
        </div>
    </div>
</body>

</html>
