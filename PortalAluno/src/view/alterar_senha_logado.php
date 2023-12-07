<?php
    require_once 'header.php';
    require_once '../controller/AlunoController.php';
    require_once '../model/Aluno.php';
    require_once '../dao/AlunoDAO.php';
    if(!isset($_SESSION['aluno'])){
        header('location: login-estudante.php');
    }

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>EducaFoco - Alterar senha</title>
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
        <div class="bg-[url('../img/img-login-estudante.svg')] bg-no-repeat border-b bg-center border-solid
                    border-slate-100 bg-contain h-52 rounded-t-2xl"></div>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
        <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Alterar Senha</h2>
                
            </div>
            <form class="flex flex-col select-none gap-y-6" method='POST' onsubmit="return validador_formulario_senha()" action="../controller/AlunoController.php?acao=alterar_senha_logado">
            
            <div class="flex flex-col">
                    <label for="senha_antiga">Senha Antiga</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="password" name="senha_antiga" id="senha_antiga"
                                 placeholder="Senha Antiga" required>
            </div>
            
            <div class="flex flex-col">
                    <label for="senha_nova">Nova Senha</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="password" name="senha" id="senha"
                                 placeholder="Nova Senha" required>
            </div>
            <div class="flex flex-col">
                    <label for="confirmacao_senha">Confirme a Senha</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="password" name="confirmacaoSenha" id="confirmacaoSenha"
                                 placeholder="Confirme a Senha" required >
                             
            </div>
            
                <button class="mt-6 rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0] hover:bg-[#2b3ff7]
                transition-colors duration-300 cursor-pointer">Alterar Senha</button>
            </form>
        </div>
    </section>
    <!-- <script src="/src/js/login-formatacao.js"></script> -->


    <script type="text/javascript">
        function validador_formulario_senha(){
            var valor_senha = $("#senha").val();
            var valor_confirmacaoSenha = $("#confirmacaoSenha").val();

            
            if(valor_senha == valor_confirmacaoSenha){

                return true;

            }else{
                alert('Senhas não conferem');
                return false;
            }

            // console.log(valor_senha);
            // console.log(valor_confirmacaoSenha);
            
                    
        }
    </script>

</body>
</html>