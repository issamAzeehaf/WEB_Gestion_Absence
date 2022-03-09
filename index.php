<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
    <title>Filières List</title>
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
                    <img class="block lg:hidden h-8 w-auto"
                            src="imgs/school_64.png" alt="Workflow">
                        <a href="index.php"><img class="hidden lg:block h-8" width="64" height="128"
                            src="imgs/school_128.png"
                            alt="Workflow" >
                        </a>    
                    </div>
                </div>
                <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a class="hgr text-white px-3 py-2 rounded-md text-sm font-medium" href="login.php?logout=1">Logout</a>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto">
        <h1 class="tracking-widest text-black-900 mt-10 mb-10 my-70"># Les filières: </h1>
        <div class="container px-80 items-center justify-center">
            <ul class="content-center items-center justify-center justify-items-center place-content-center">
                
                <?php 
                $req="select * from filiere";
                $res=$dbcnx->query($req);
                if($res->num_rows){
                    while($tab=$res->fetch_assoc()){
                        ?>
                            <a href="class.php?f=<?= $tab["idFiliere"]?>">
                                <li class="border list-none  rounded px-3 py-3" style='border-bottom-width:0'><?php echo $tab["nomFi"]?></li>
                            </a>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>