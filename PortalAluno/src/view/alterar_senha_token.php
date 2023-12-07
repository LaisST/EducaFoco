<?php
    require_once 'header.php';
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>EducaFoco - Alterar senha</title>
    <?php
        require_once '../controller/AlunoController.php';

        $alunoController = new AlunoController();
        if(isset($_GET['token'])){
            $token = $_GET['token'];
            setcookie('token', $token, time() + 3600, '/'); // Este exemplo define o cookie para expirar em 1 hora

            if (empty($token) || !$alunoController->existe_token($token)) {
                echo "<script language='javascript' type='text/javascript'>
                alert('Token inválido ou expirado')
                window.location.href='../view/login-estudante.php'</script>";
                
            }
        }
    
    ?>
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80
             flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class="w-full h-full max-w-lg p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800
                    sm:h-auto">

        <div class="bg-[url('../img/img-login-estudante.svg')] bg-no-repeat border-b bg-center border-solid
                    border-slate-100 bg-contain h-52 rounded-t-2xl"></div>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
        <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Alterar Senha</h2>
                
            </div>
            <form class="flex flex-col select-none gap-y-6" method='POST' onsubmit="return validador_formulario_senha()" action="../controller/AlunoController.php?acao=alterar_senha">
            <div class="flex flex-col">
                    <label for="nome">Nova Senha</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300
                                 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300
                                 border-slate-200" type="password" name="senha" id="senha"
                                 placeholder="Nova Senha" required>
            </div>
            <div class="flex flex-col">
                    <label for="nome">Confirme a Senha</label>
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