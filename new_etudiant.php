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

<?php

$req="select * from filiere where idFiliere =".$_GET['f'];
    $res=$dbcnx->query($req);
        if($res->num_rows){
            $tab=$res->fetch_assoc();
        }
?>
<?php
    
$nom=$_POST['nom']??$nom="";
$prenom=$_POST['prenom']??$prenom="";
$tel=$_POST['tel']??$tel="";
$email=$_POST['email']??$email="";
$idF=$_GET['f']; 

if(isset($_POST['submit'])){
 
    if(!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email)){
        $req1="select * from etudiant";
        $result1=$dbcnx->query($req1);
        $tab1=$result1->fetch_assoc();
        if($tab1['nomEtu']==$nom && $tab1['prenomEtu']==$prenom) {
            echo "already in db";
        }
        else{
            $req="insert into etudiant (nomEtu,prenomEtu,telEtu,emailEtu,idFiliere) 
            values ('$nom','$prenom','$tel','$email','$idF')";
            $result=$dbcnx->query($req);
            if(!$result){
                echo "ereur " ;       }
            else{
                echo "okeeeey les données inserées";
                 header("location:class.php?f=$idF");
            }
        }
        
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$tab["nomFi"]?> - Add Student</title>
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
                            <a href="index.php" class="hgr text-white px-3 py-2 rounded-md text-sm font-medium" >Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="grid place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mt-20">
            <h1 class="text-xl font-semibold text-center mb-8"><span>Add Student to <?=$tab["nomFi"]?></span></h1>
            <form class="mt-2" method="POST" action="new_etudiant.php?f=<?=$_GET['f']?>">
                <label for="nom" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">nom</label>
                <input id="nom" type="text" name="nom" placeholder="nom"
                    autocomplete="nom"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                <label for="prenom" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">prenom</label>
                <input id="prenom" type="text" name="prenom" placeholder="prenom"
                    autocomplete="prenom"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                <input id="email" type="email" name="email" placeholder="nom.prenom@enset-media.ac.ma"
                    autocomplete="email"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                <label for="tel" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Telephone</label>
                <input id="tel" type="tel" name="tel" placeholder="0600000000" autocomplete="tel"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                
                <button type="submit" name="submit"
                    class="transition duration-500 ease-in-out transform hover:-translate-z-1 hover:scale-110 w-full py-3 mt-6 font-medium tracking-widest text-white uppercase gnavbar shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Add
                </button>
            </form>
        </div>
    </div>
</body>

</html>

