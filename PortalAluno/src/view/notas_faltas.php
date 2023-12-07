<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';

    $alunoController = new AlunoController();
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>


    <title>EducaFoco - Notas e Faltas</title>
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
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Notas e Faltas</h2>

            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Disciplina</th>
                                            <th>Nota 1</th>
                                            <th>Nota 2</th>
                                            <th>Nota 3</th>
                                            <th>Faltas</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $rows = $alunoController->exibir_notas_faltas();
                                    
                                            if(mysqli_num_rows($rows) > 0){
                                                while($element = mysqli_fetch_assoc($rows)){
                                                    echo "<tr>";
                                                    echo "  <td>".$element['nome_disciplina']."</td>";
                                                    echo "  <td>".$element['nota1']."</td>";
                                                    echo "  <td>".$element['nota2']."</td>";
                                                    echo "  <td>".$element['nota3']."</td>";
                                                    echo "  <td>".$element['faltas']."</td>";
                                                   
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
 
        </div>
        <div class="mt-4"></div>

</div>
</section>
</body>
</html>