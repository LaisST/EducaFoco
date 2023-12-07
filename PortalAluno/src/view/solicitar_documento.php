<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';
?>

    <title>EducaFoco - Solicitação de Documento</title>
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
                <h2 class="text-2xl font-normal sm:text-3xl">Solicitar Documento</h2>

            </div>
            <form class="flex flex-col select-none gap-y-6" method='POST' action="../controller/AlunoController.php?acao=solicitar_documento">
                <div class="flex flex-col">
                <label for="documento">Documento:</label>
        <select name="documento" required>
        <option value="" disabled selected>Selecione o tipo de documento</option>
        <option value="Atestado de Matricula Simples" >Atestado de Matricula Simples</option>
        <option value="Atestado de Frequencia" >Atestado de Frequencia</option>
        <option value="Atestado Geral" >Atestado Geral</option>
        </select>

                <button class="mt-6 rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0] hover:bg-[#2b3ff7]
                transition-colors duration-300 cursor-pointer">Enviar</button>
            </form>
        </div>
    </section>


</body>
</html>

