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
<?php

$req="select * from filiere where idFiliere =".htmlspecialchars($_GET['f']);
    $res=$dbcnx->query($req);
        if($res->num_rows){
            $tab=$res->fetch_assoc();
        }
?>




<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo htmlspecialchars($_GET['f']) ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <a href="index.php"><img class="hidden lg:block h-8" width="64" height=""
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

    <body class="antialiased font-sans bg-gray-200">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-semibold leading-tight"><?=$tab["nomFi"]?></h2>
                </div>
                <button style="color: #61045F !important; border: 2px solid #AA076B;" id="add_st"
                    class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center ml-auto mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172"
                        style=" fill:#000000;">
                        <g transform="translate(12.9,12.9) scale(0.85,0.85)">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                <g fill="#61045F" stroke="none">
                                    <path
                                        d="M64.5,0c-23.73958,0 -43,19.26042 -43,43c0,23.73958 19.26042,43 43,43c23.73958,0 43,-19.26042 43,-43c0,-23.73958 -19.26042,-43 -43,-43zM35.83333,57.33333h57.33333c-5.29101,10.58203 -16.04101,17.91667 -28.66667,17.91667c-12.62565,0 -23.37565,-7.33463 -28.66667,-17.91667zM39.64063,93.39063c-15.98503,4.19922 -28.52669,14.19336 -34.26562,35.60938h118.25c-5.73893,-21.41601 -18.2526,-31.41015 -34.26562,-35.60937c-7.39062,3.97526 -15.87305,6.27083 -24.85937,6.27083c-8.98633,0 -17.44076,-2.29557 -24.85937,-6.27083zM135.27083,107.5v28.21875h-27.77083v8.51042h27.77083v27.77083h8.73438v-27.77083h27.99479v-8.51042h-27.99479v-28.21875z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-2">Add Etudiant</span>
                </button>
                <script>
                    document.querySelector("#add_st").addEventListener('click', function(e) {
                        window.location = "new_etudiant.php?f=<?php echo htmlspecialchars($_GET['f']) ?>"
                    })
                </script>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Full Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        E-mail
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Telephone
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

<?php
    $idf=htmlspecialchars($_GET['f']);
    $req1="select * from etudiant where idFiliere=$idf";
    $res1=$dbcnx->query($req1);
        if($res1->num_rows){
         while($tab1=$res1->fetch_assoc()){
             ?>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <label class="inline-flex items-center">
                                                <input name="m_u" type="checkbox" class="form-checkbox h-5 w-5 mr-2"
                                                    data-user-id="<?=$tab1['idEtu']?>">
                                            </label>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?=$tab1['nomEtu']?> <?=$tab1['prenomEtu']?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap"><?=$tab1['emailEtu']?></p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?=$tab1['telEtu']?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button class="text-grey" id="edit_btn" data-user="<?=$tab1['nomEtu']?> <?=$tab1['prenomEtu']?>"
                                            data-user-id="<?=$tab1['idEtu']?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28"
                                                height="28" viewBox="0 0 172 172" style=" fill:#61045F;">
                                                <g transform="translate(-13.76,-13.76) scale(1.16,1.16)">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                                        <g fill="#61045F">
                                                            <path
                                                                d="M89.30769,21.08985c-37.67462,0 -68.21785,30.54323 -68.21785,68.21785c0,37.67462 30.54323,68.22446 68.21785,68.22446c37.67462,0 68.22446,-30.54985 68.22446,-68.22446c0,-37.67462 -30.54985,-68.21785 -68.22446,-68.21785zM125.69231,99.23077h-26.46154v26.46154h-19.84615v-26.46154h-26.46154v-19.84615h26.46154v-26.46154h19.84615v26.46154h26.46154z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="text-grey" data-user-id="<?=$tab1['idEtu']?>" id="edit_st">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28"
                                                height="28" viewBox="0 0 172 172" style=" fill:#000000;">
                                                <g transform="translate(1.72,1.72) scale(0.98,0.98)">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                                        <g fill="#000000" stroke="none">
                                                            <path
                                                                d="M121.38542,7.61458l-93.61458,93.61458l-20.07227,63.07226l63.07227,-20.07226l93.61458,-93.61458c0,0 -0.71667,-15.05717 -14.33333,-28.66667c-13.61667,-13.61667 -28.66667,-14.33333 -28.66667,-14.33333zM124.07292,19.26042c7.68267,1.462 13.7993,4.71645 18.51855,9.56022c4.71925,4.84377 8.04111,11.27686 10.14811,19.10645l-12.98958,12.98958l-28.66667,-28.66667l10.30208,-10.30208zM35.67936,108.40983c0.08473,0.02134 8.61749,2.17868 17.1748,10.736c9.31667,8.6 10.75,16.48893 10.75,16.48893l0.30794,0.36393l-25.43327,8.18848l-10.722,-10.72201z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button id="delete_st" data-user-id="<?=$tab1['idEtu']?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28"
                                                height="28" viewBox="0 0 172 172" style=" fill:#000000;">
                                                <g transform="translate(4.3,4.3) scale(0.95,0.95)">
                                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                                        <g fill="#000000" stroke="none">
                                                            <path
                                                                d="M73.90625,-0.22396c-12.3457,0 -22.5638,9.6582 -23.73958,21.72396h-35.83333v14.33333h35.60938v0.22396h72.11458v-0.22396h35.60938v-14.33333h-35.83333c-1.11979,-12.06576 -10.86198,-21.72396 -22.84375,-21.72396zM73.90625,14.55729h25.08333c3.63933,0 6.32683,2.85547 7.39063,6.71875h-40.76042c1.00781,-3.86328 3.80729,-6.71875 8.28646,-6.71875zM28.66667,43v118.25c0,5.73893 5.01107,10.75 10.75,10.75h93.83854c5.73893,0 10.75,-5.01107 10.75,-10.75v-118.25zM50.16667,64.5h7.16667v93.16667h-7.16667zM71.66667,64.5h7.16667v93.16667h-7.16667zM93.16667,64.5h7.16667v93.16667h-7.16667zM114.66667,64.5h7.16667v93.16667h-7.16667z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <script>
                                            document.querySelectorAll("#edit_st").forEach((x) => {
                                                x.addEventListener('click', function(e) {
                                                    if (e.srcElement.nodeName === "path" ){
                                                        let btn = e.target.parentElement.parentElement.parentElement.parentElement.parentElement
                                                        let userId = btn.getAttribute('data-user-id');
                                                        window.location = "edit_etudiant.php?f=<?php echo htmlspecialchars($_GET['f']) ?>&id="+userId // write here userId
                                                    }
                                            })})
                                        </script>
                                        <script>
                                            document.querySelectorAll("#delete_st").forEach((x) => {
                                                x.addEventListener('click', function(e) {
                                                    if (e.srcElement.nodeName === "path" ){
                                                        let btn = e.target.parentElement.parentElement.parentElement.parentElement.parentElement
                                                        let userId = btn.getAttribute('data-user-id');
                                                        window.location = "delete_etudiant.php?f=<?php echo htmlspecialchars($_GET['f']) ?>&id="+userId // write here userId
                                                    }
                                            })})
                                        </script>
                                    </td>
                                </tr>

            <?php
        }}

?>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full modal hidden" id="modal"
            style=" z-index:9999">
            <div class="bg-white rounded-lg w-1/2 modal-content">
                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full">
                        <div class="text-gray-900 font-medium text-center mb-2"><strong id="r_m"></strong>
                        </div>
                        <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" id="create_close"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                    <hr>
                    <label for="matiere"
                        class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Matiere</label>
                    <input id="matiere" type="text" placeholder="Base de données" autocomplete="matiere"
                        class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required />

                    <label for="date" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Date</label>
                    <input id="date" type="date" placeholder="Base de données" autocomplete="date"
                        class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required />

                    <label for="date" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Heure
                        Debut</label>
                    <div class="flex" id="time">
                        <select name="d_hours"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">10</option>
                            <option value="12">12</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="d_minutes"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="d_ampm"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block p-2 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="AM">AM </option>
                            <option value="PM">PM </option>
                        </select>
                    </div>
                    <label for="date" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Heure Fin</label>
                    <div class="flex" id="time">
                        <select name="f_hours"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">10</option>
                            <option value="12">12</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="f_minutes"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="f_ampm"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block p-2 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="AM">AM </option>
                            <option value="PM">PM </option>
                        </select>
                    </div>
                    <hr>
                    <div class="ml-auto mt-2">
                        <button class="gnavbar hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            id="create_submit" name="create">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full modal hidden" id="m_modal"
            style=" z-index:9999">
            <div class="bg-white rounded-lg w-1/2 modal-content">
                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full">
                        <div class="text-gray-900 font-medium text-center mb-2"><strong id="m_r_m"></strong>
                        </div>
                        <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" id="create_close"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                    <hr>
                    <label for="m_matiere"
                        class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Matiere</label>
                    <input id="m_matiere" type="text" placeholder="Base de données" autocomplete="matiere"
                        class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required />

                    <label for="m_date" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Date</label>
                    <input id="m_date" type="date" placeholder="Base de données" autocomplete="date"
                        class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required />

                    <label for="m_time" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Heure
                        Debut</label>
                    <div class="flex" id="m_time">
                        <select name="m_d_hours"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">10</option>
                            <option value="12">12</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="m_d_minutes"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="m__ampm"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block p-2 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="AM">AM </option>
                            <option value="PM">PM </option>
                        </select>
                    </div>
                    <label for="m_time" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Heure
                        Fin</label>
                    <div class="flex" id="m_time">
                        <select name="m_f_hours"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">10</option>
                            <option value="12">12</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="m_f_minutes"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <span class="text-xl mr-2"></span>
                        <select name="m_f_ampm"
                            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-20 block p-2 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                            <option value="AM">AM </option>
                            <option value="PM">PM </option>
                        </select>
                    </div>
                    <hr>
                    <div class="ml-auto mt-2">
                        <button class="gnavbar hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            id="m_create_submit">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center">
            <button id="submit_multiple" style="width:30%"
                class="transition duration-500 ease-in-out transform hover:-translate-z-1 hover:scale-110 w-full py-3 mt-6 font-medium tracking-widest text-white uppercase gnavbar shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Submit selected étudiants (0)
            </button>
        </div>
    </body>
    <script type="text/javascript">
        //let StudentsArray = < ? php echo json_encode($StudentArray); ? > ;
        let textM = "Submit selected étudiants"
        let _userID = ""
        let modal = document.querySelector("#modal");
        let modal2 = document.querySelector("#m_modal");
        let openBtn = document.querySelectorAll("#edit_btn");
        let closeBtn = document.querySelectorAll("#create_close");
        let user = document.querySelector("#r_m");
        openBtn.forEach((u) => {
            u.onclick = function() {
                modal.classList.remove('hidden');
                modal.classList.remove('z-50');
                document.body.style = "background-color: rgba(0, 0, 0, 0.4);"
                let userName = u.getAttribute('data-user');
                _userID = u.getAttribute('data-user-id');
                user.textContent = userName;
            }
        })
        closeBtn.forEach((e) => {
            e.onclick = function() {
                modal.classList.add('hidden');
                modal.classList.remove('z-50');
                modal2.classList.add('hidden');
                modal2.classList.remove('z-50');
                document.body.style = "background-color: ;"
                document.body.classList.remove('bg-gray-200');
            }
        })
        window.onclick = function(event) {
            if (event.target == modal || event.target == modal2) {
                modal.classList.add('hidden');
                modal.classList.add('z-50');
                modal2.classList.add('hidden');
                modal2.classList.add('z-50');
                document.body.style = "background-color: ;"
                document.body.classList.add('bg-gray-200');
            }
        }

        function sendData(data) {
            const XHR = new XMLHttpRequest();
            let urlEncodedData = "",
                urlEncodedDataPairs = [],
                name;
            for (name in data) {
                urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
            }
            urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');
            XHR.open('POST', 'create.php');
            XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            XHR.send(urlEncodedData);
        }
        btn = document.querySelectorAll("#create_submit").forEach(b => {
            b.addEventListener('click', function(e) {
                let data = {}
                let parent = e.target.parentElement.parentElement
                data['userId'] = _userID;
                data['matiere'] = parent.children[3].value
                data['date'] = parent.children[5].value
                data['heure_debut'] = parent.children[7].children[0].value + ':' + parent.children[7]
                    .children[2].value + ' ' + parent.children[7].children[4].value
                data['heure_fin'] = parent.children[9].children[0].value + ':' + parent.children[9]
                    .children[2].value + ' ' + parent.children[9].children[4].value
                if (Validate(data)) {
                    console.log(data);
                    sendData(data);
                }
            })
        })

        function Validate(data) {
            r = true
            if (data.userId == "") {
                alert("Error: Unknown userId");
                r = false
            }
            if (data.matiere == "") {
                alert("Error: Required matiere");
                r = false
            }
            if (data.date == "") {
                alert("Error: Required date");
                r = false
            }
            if (data.heure_debut == "") {
                alert("Error: Required heure_debut");
                r = false
            }
            if (data.heure_fin == "") {
                alert("Error: Required heure_fin");
                r = false
            }
            return r
        }
        document.querySelectorAll('[name="m_u"]').forEach((el) => {
            el.addEventListener('click', function(e) {
                let data = getChecked();
                document.querySelector("#submit_multiple").textContent = textM + " (" + data.length +
                    ")"
            })
        });
        document.querySelector("#submit_multiple").addEventListener("click", (el) => {
            let users = getChecked();
            document.querySelector("#m_r_m").textContent = "Selected users (" + users.length + ")"
            modal2.classList.remove('hidden');
            modal2.classList.remove('z-50');
            document.body.style = "background-color: rgba(0, 0, 0, 0.4);"
            document.querySelector("#m_create_submit").addEventListener("click", (el) => {
                let DataQuery = GrabData(el);
                DataQuery['users'] = users;
                if (users.length === 0) alert("Error : no users selected.")
                else {
                    if (Validate(DataQuery)) {
                        console.log(DataQuery);
                        sendData(DataQuery);
                    }
                }
            })
        })

        function getChecked() {
            let values = [];
            let checkboxes = document.querySelectorAll('[name="m_u"]:checked');
            Array.prototype.forEach.call(checkboxes, function(el) {
                if (el.checked) {
                    values.push(el.getAttribute('data-user-id'));
                }
            });
            return values;
        }

        function GrabData(e) {
            let data = {}
            let parent = e.target.parentElement.parentElement
            data['matiere'] = parent.children[3].value
            data['date'] = parent.children[5].value
            data['heure_debut'] = parent.children[7].children[0].value + ':' + parent.children[7]
                .children[2].value + ' ' + parent.children[7].children[4].value
            data['heure_fin'] = parent.children[9].children[0].value + ':' + parent.children[9]
                .children[2].value + ' ' + parent.children[9].children[4].value
            return data;
        }
    </script>
</body>

</html>
