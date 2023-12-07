<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';
    require_once '../dao/AlunoDAO.php';

    if(!isset($_SESSION['aluno'])){
        header('location: login-estudante.php');
    }
?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../vendor/fullcalendar/lib/main.min.css">
        <title>EducaFoco - Matricula</title>
    </head>
    <body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80 flex items-center justify-center min-[300px]:py-4 sm:px-4">
    <section class=" h-full p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800
                    sm:h-auto">
    <a href="home.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 lg:w-9 h-7 lg:h-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
        </a>
        <div class=" bg-no-repeat border-b bg-center border-solid border-slate-50 bg-contain h-52 rounded-t-2xl"></div>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl"></h2>
                <img src="../img/construcao.png">


            </div>
                
            </div>
        </div>
    </section>
    </body>
</html>