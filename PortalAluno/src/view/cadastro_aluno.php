<?php
    require_once 'header.php';
?>

    <title>EducaFoco - Secretaria</title>
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80
             flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class="w-full h-full max-w-lg p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800
                    sm:h-auto">
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Cadastro Aluno</h2>

            </div>
            <form class="flex flex-col select-none gap-y-6" method='POST' action="../controller/AlunoController.php?acao=cadastrar">
                <div class="flex flex-col">
                    <label for="ra">Número do R.A</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="number" name="ra" id="ra"
                                 placeholder="R.A" min="1234567891023" maxlength="13"
                                 oninput="if (this.value.length = this.maxLength)
                                 this.value = this.value.slice(0, this.maxLength)" autocomplete="off" required>
                </div>
                <div class="flex flex-col">
                    <label for="nome">Nome completo</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="text" name="nome" id="nome"
                                 placeholder="Nome Completo">
                </div>
                <div class="flex flex-col">
                    <label for="cpf">CPF</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="number" name="cpf" id="cpf"
                                 placeholder="CPF" min="12345678978" maxlength="11"
                                 oninput="if (this.value.length = this.maxLength)
                                 this.value = this.value.slice(0, this.maxLength)" autocomplete="off" required>
                </div>
                <div class="flex flex-col">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="date" name="data_nascimento" id="data_nascimento"
                                 placeholder="Data de Nascimento">
                </div>
                <div class="flex flex-col">
                    <label for="email">E-mail</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="text" name="email" id="email"
                                 placeholder="E-mail">
                </div>
                <div class="flex flex-col">
                    <label for="telefone">Telefone</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="number" name="telefone" id="telefone"
                                 placeholder="Telefone">
                </div>
                <button class="mt-6 rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0] hover:bg-[#2b3ff7]
                transition-colors duration-300 cursor-pointer">Cadastrar</button>
            </form>
        </div>
    </section>
    <!-- <script src="/src/js/login-formatacao.js"></script> -->

</body>
</html>