<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducaFoco</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="src/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;500&display=swap"
                rel="stylesheet">
    <link rel="stylesheet" href="src/css/output.css">
</head>
<body class="bg-[url('../img/img-fundo.svg')] bg-no-repeat h-screen bg-top bg-indigo-100 bg-contain bg-opacity-80
            flex items-center justify-center min-[450px]:py-4 sm:px-4">
    <section class="min-[450px]:rounded-2xl drop-shadow-xl bg-white font-light max-w-md text-slate-800 h-full w-full
                    sm:h-auto sm:w-[30rem] p-6">
        <div class="bg-[url('../img/img-tela-inicial.svg')] bg-no-repeat border-b bg-center border-solid
                    border-slate-100 bg-contain h-52 rounded-t-2xl"></div>
        <div class="flex flex-col pt-8 font-sm gap-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-normal sm:text-3xl">Quem é você?</h2>
                <p class="sm:text-lg text-slate-400">Escolha um que descreva você</p>
            </div>
            <div class="grid grid-cols-2 gap-x-4">
                <input class="hidden input-identificador" id="estudante" type="radio" name="identificacao" checked>
                <label class="flex flex-col items-center px-6 py-10 transition-opacity duration-300 border border-solid
                            rounded-lg cursor-pointer select-none sm:text-lg gap-y-2 bg-slate-100 border-slate-200
                            opacity-40 label-identificador" for="estudante">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" class="w-8 h-8 transition-colors duration-300 sm:w-9 sm:h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75
                                3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676
                                0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Estudante
                </label>
                <input class="hidden input-identificador" id="professor" type="radio" name="identificacao">
                <label class="flex flex-col items-center px-6 py-10 transition-opacity duration-300 border
                                border-solid rounded-lg cursor-pointer select-none sm:text-lg gap-y-2 bg-slate-100
                                border-slate-200 opacity-40 label-identificador" for="professor">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" class="w-8 h-8 transition-colors duration-300 sm:w-9 sm:h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491
                            6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0
                            00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902
                            0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702
                            50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0
                            0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                    Professor
                </label>
            </div>
            <button class="rounded-xl sm:text-lg font-normal py-3.5 text-white bg-[#3829e0]
            hover:bg-[#2b3ff7] transition-colors duration-300 cursor-pointer"
            onclick="redirecionar()">Continuar</button>
        </div>
    </section>
</body>
<script>
    function redirecionar() {
        if (document.getElementById('estudante').checked) {
            window.location.href = 'src/view/login-estudante.php'; // Redireciona para a página do aluno
        } else if (document.getElementById('professor').checked) {
            window.location.href = 'src/view/login-professor.php';
        }
    }
</script>
</html>
