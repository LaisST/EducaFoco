<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';

        if(!isset($_SESSION['aluno'])){
        header('location: login-estudante.php');
    }
?>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <title>EducaFoco - Calendario</title>
    <style>
        a{  
            color: black !important;
            text-decoration: none !important;
        }
    </style>
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80
             flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class=" h-full p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800
                    sm:h-auto">
        <a href="home.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 lg:w-9 h-7 lg:h-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
        </a>
             <div style="width: 1000px; height: 800px; background-color: white; border-radius: 10px;">
                <div class="calendarUser"></div>
                <!-- <button href="home.php" type="button" class="btn btn-primary  float-end bg-[#2C3E50] hover:bg-[#2C3E50]
                transition-colors duration-300 cursor-pointer"
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; margin-top: 10px; background-color: #2C3E50;border-color: #2C3E50;"
                        onclick="window.location.href = 'home.php';">
                        Voltar
                </button> -->
</type=>
            </div>
             </section>
            
    <!-- Modal -->
    <div id="event-details-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Evento</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div id="event-title"></div>
                <div id="event-description"></div>
                <div id="event-start"></div>
                <div id="event-end"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-editar" id="event-id-editar" data-dismiss="modal">Editar</button>
                <button type="button" class="btn btn-danger btn-excluir" id="event-id-excluir" data-dismiss="modal">Excluir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


    <script src="../../vendor/fullcalendar/lib/main.min.js"></script>
    <script src="../js/calendario.js"></script>
    <script>
            $(".btn-excluir").on("click",function(){
                if(confirm("Deseja realmente excluir esse evento?")){
                    document.location='../controller/EventoController.php?acao=deletar_evento&id='+$(this).val();
            }
            });

            $(".btn-editar").on("click",function(){
                document.location='../view/editar_evento.php?id='+$(this).val();
            });
        </script>
</body>
</html>