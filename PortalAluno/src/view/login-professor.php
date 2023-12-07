<?php
    require_once 'header.php';
?>
    <title>EducaFoco - Professor</title>
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80 flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class="w-full h-full max-w-lg p-6 font-light bg-white min-[450px]:rounded-2xl drop-shadow-xl text-slate-800 sm:h-auto">
        <div class="bg-[url('../img/img-login-professor.svg')] bg-no-repeat border-b bg-center border-solid border-slate-50 bg-contain h-52 rounded-t-2xl"></div>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Entrar</h2>
                <p class="sm:text-lg text-slate-400">Bem-vindo de volta, <span class="font-normal">professor</span>!</p>
            </div>
            <form class="flex flex-col select-none gap-y-6" action="#">
                <div class="flex flex-col">
                    <label for="cpf">Número do CPF</label>
                    <input class="bg-slate-50 focus:bg-slate-100 focus:border-[#3829e082] transition-colors duration-300 p-2 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300 border-slate-200 js-campo-cpf" type="text" name="rabg-slate-50 focus:bg-slate-100 " id="cpf" placeholder="000.000.000-00" minlength="14" maxlength="14" autocomplete="off" required>
                </div>
                <div class="flex flex-col">
                    <label for="senha">Senha</label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="absolute transition-opacity w-6 h-6 top-[14px] cursor-pointer right-2 js-senha-mostrar-svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="opacity-0 transition-opacity absolute w-6 h-6 top-[14px] cursor-pointer right-2 js-senha-esconder-svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input class="bg-slate-50 focus:bg-slate-100 w-full focus:border-[#3829e082] transition-colors duration-300 p-2 pr-10 mt-1 border border-solid rounded-lg outline-none placeholder-slate-300 border-slate-200 js-senha-campo" type="password" name="senha" id="senha" placeholder="Senha" autocomplete="off" required>
                    </div>
                    <a class="mt-2 hover:text-[#3829e0] transition-colors hover:underline w-max text-slate-400" href="#">Esqueci minha senha</a>
                </div>
                <button class="mt-6 rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0] hover:bg-[#2b3ff7] transition-colors duration-300 cursor-pointer">Entrar</button>
            </form>
        </div>
    </section>
    <script src="/src/js/login-formatacao.js"></script>
</body>
</html>