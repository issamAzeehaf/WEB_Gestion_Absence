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
                            
        include("cnx.php");
            

            if(isset($_POST['login'])){
                $log=$_POST['email'];
                $pass=$_POST['password'];
                if(!empty($log) || !empty($pass)){
                    $req="select * from professeur 
                    where login='$log' 
                    and pass='$pass'";
                    $res=$dbcnx->query($req);

                    if($res->num_rows){
                        
                        $tab=$res->fetch_assoc();
                           session_name('admin'); 
                            $_SESSION['log']=$tab['idUser'];
                            header("location:index.php");
                        
                }
                    else{
                        header('location:login.php');
                }
            }
                else{
                        header('location:login.php');
                }
            
        }
        if(isset($_GET['logout'])){
            session_start();
            session_name('admin');
            unset($_SESSION['log']);
            header("location:login.php");
        }

?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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
                        <img class="hidden lg:block h-8" width="64" height="128"
                            src="imgs/school_128.png"
                            alt="Workflow">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="grid place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mt-20">
            <h1 class="text-xl font-semibold text-center"><span>Login</span></h1>
            <form class="mt-2" method="POST" action="login.php">
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                <input id="email" type="email" name="email" placeholder="nom.prenom@enset-media.ac.ma"
                    autocomplete="email"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                <input id="password" type="password" name="password" placeholder="********" autocomplete="password"
                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                    required />
                <button type="submit" name="login"
                    class="transition duration-500 ease-in-out transform hover:-translate-z-1 hover:scale-110 w-full py-3 mt-6 font-medium tracking-widest text-white uppercase gnavbar shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>