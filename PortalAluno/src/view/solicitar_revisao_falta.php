<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';
?>
<?php
$disciplinas = array (
'Alg000'=> 'Algoritmos Lógica Programação',
'Arq000'=> 'Arquitetura Organização Computadores',
'Ban000'=> 'Banco Dados',
'Com000'=> 'Computação Cognitiva',
'Con000'=> 'Contabilidade',
'Des000'=> 'Desenvolvimento Sistemas',
'Emp000'=> 'Empreendedorismo',
'Eng000'=> 'Engenharia Software I',
'Eng001'=> 'Engenharia Software II',
'Eng002'=> 'Engenharia Software III',
'Est000'=> 'Estágio Supervisionado',
'Est001'=> 'Estatística Aplicada',
'Est002'=> 'Estruturas Dados',
'Éti000'=> 'Ética Responsabilidade Profissional',
'Ges000'=> 'Gestão Projetos',
'Ges001'=> 'Gestão Equipes',
'Ges002'=> 'Gestão Governança Tecnologia Informação',
'Ing000'=> 'Inglês I',
'Ing001'=> 'Inglês II',
'Ing002'=> 'Inglês III',
'Ing003'=> 'Inglês IV',
'Ing004'=> 'Inglês V',
'Ing005'=> 'Inglês VI',
'Int000'=> 'Internet Coisas',
'Int001'=> 'Inteligência Emocional Autoconhecimento',
'Int002'=> 'Introdução ao Desenvolvimento Sistemas',
'Int003'=> 'Interação Humano Computador',
'Int004'=> 'Inteligência Artificial',
'Lab000'=> 'Laboratório Banco Dados',
'Lab001'=> 'Laboratório Engenharia Software',
'Mat000'=> 'Matemática Discreta',
'Met000'=> 'Metodologia Pesquisa Científico-tecnológica',
'Pla000'=> 'Planejamento Financeiro',
'Pro000'=> 'Programação para WEB',
'Pro001'=> 'Programação Orientada a Objetos',
'Pro002'=> 'Programação para Dispositivos Móveis I',
'Pro003'=> 'Programação para Dispositivos Móveis II',
'Pro004'=> 'Projeto Integrador I',
'Pro005'=> 'Projeto Integrador II',
'Pro006'=> 'Projeto Integrador III',
'Pro007'=> 'Projeto Integrador IV',
'Red000'=> 'Redes Computadores',
'Seg000'=> 'Segurança Informação',
'Sis000'=> 'Sistemas Distribuídos',
'Sis001'=> 'Sistemas Informação',
'Sis002'=> 'Sistemas Operacionais',
'Tes000'=> 'Teste Software',
'Tóp000'=> 'Tópicos em Bancos Dados Big Data',
'Vis000'=> 'Visão Computacional',

)
?>

    <title>EducaFoco - Solicitação de Revisão de Faltas</title>
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80
             flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class="w-full h-full max-w-lg p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800
                    sm:h-auto">
        <a href="home.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 lg:w-9 h-7 lg:h-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
        </a>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Solicitar Revisão de Faltas</h2>

            </div>
            <form class="flex flex-col select-none gap-y-6" method='POST' action="../controller/AlunoController.php?acao=solicitar_revisao_falta">
            <?php
        $alunoDAO = new AlunoDAO();
        $banco = new Conexao();

        $sqlRA = "SELECT ra FROM aluno";
        $result = mysqli_query($banco->getConexao(), $sqlRA);

        // Verifica se a consulta foi bem sucedida
        if ($result->num_rows > 0) {
            // Preenche um array com os RAs obtidos
            $ras = array();
            while ($row = $result->fetch_assoc()) {
                $ras[] = $row["ra"];
            }
        } else {
            echo "Nenhuma Disciplina foi encontrada na banco de dados.";
        }
    ?>   
                <div class="flex flex-col">
                <label for="disciplina">Disciplina:</label>
    <select name="disciplina" required>
        <option value="" disabled selected>Selecione uma disciplina</option>
        <?php
        // Preenche o dropdown com as opções de disciplinas do array
        foreach ($disciplinas as $codDisciplina => $nomeDisciplina) {
            echo "<option value=\"$codDisciplina\">$nomeDisciplina</option>";
        }
        ?>
    </select><br><br>
                </div>
                <div class="flex flex-col">
                    <label for="justificativa">Justificativa:</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="text" name="justificativa" id="justificativa"
                                 placeholder="Justificativa">
                </div>
            
                <button class="mt-6 rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0] hover:bg-[#2b3ff7]
                transition-colors duration-300 cursor-pointer">Enviar</button>
            </form>
        </div>
    </section>
    <!-- <script src="/src/js/login-formatacao.js"></script> -->

</body>
</html>

