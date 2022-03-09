<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!-<![endif]-->
<?php
include("cnx.php");
$idf=$_GET['f'];
$id=$_GET['id'];
?>
<?php
session_start();
    if(!isset($_SESSION['log'])){
        header("location:login.php");
    }
?>




<?php
$req="select * from etudiant where idEtu = ".$_GET['id'];
    $res=$dbcnx->query($req);
        if($res->num_rows){
         $tab=$res->fetch_assoc();
        }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo htmlspecialchars($_GET['f']) ?> - Delete Student</title>
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
    <div class="grid place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mt-20">
            <h1 class="text-xl font-semibold text-center mb-8"><span>Delete Student / <?php echo htmlspecialchars($_GET['f']) ?></span></h1>
            <form class="mt-2" method="POST" action="delete_etudiant.php?f=<?=$idf?>&id=<?=$id?>" id='form'>
                <h2 class="block mt-2 mb-6 text-md font-semibold text-gray-600 uppercase"># Are you sure want to delete this user ?</h2>
                <h3 class="font-semibold mb-2 text-gray-600 uppercase">Full Name : <span class="text-black"><?=$tab['nomEtu']?> <?=$tab['prenomEtu']?></span></h3>
                <h3 class="font-semibold mb-2 text-gray-600 uppercase">Email     : <span class="text-black"><?=$tab['emailEtu']?></span></h3>
                <h3 class="font-semibold mb-2 text-gray-600 uppercase">Telephone : <span class="text-black"><?=$tab['telEtu']?></span></h3>
            </form>
                <div class="fixed flex items-center justify-center">
                    <button
                        onclick="GoBack()" name="back"
                        class="mr-4 mt-6 transition duration-500 ease-in-out transform hover:-translate-z-1 hover:scale-110 p-4 mt-6 font-medium tracking-widest text-white uppercase gnavbar shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        CANCEL
                    </button>
                    <button name="del"
                        class="ml-auto mt-6 transition duration-500 ease-in-out transform hover:-translate-z-1 hover:scale-110 p-4 mt-6 font-medium tracking-widest text-white uppercase gnavbar shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        <a href="delete.php?f=<?=$idf?>&id=<?=$id?>">DELETE</a>
                </button>
                </div>
            <script>
                function GoBack(){
                    window.location = 'class.php?f=<?=$idf?>'
                }
            </script>
        </div>
    </div>
</body>

</html>
