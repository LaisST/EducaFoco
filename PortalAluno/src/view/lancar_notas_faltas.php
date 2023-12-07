<?php

    require_once '../dao/AlunoDAO.php';
    require_once '../dao/Conexao.php';

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Notas</title>
</head>
<body>

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

<form method="post" action="../controller/AlunoController.php?acao=lancar_notas_faltas">
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
            echo "Nenhum RA encontrado no banco de dados.";
        }
    ?>
        <label for="ra">RA:</label>
        <select name="ra" required>
        <option value="" disabled selected>Selecione um RA</option>
        <?php
        // Preenche o dropdown com as opções de RAs obtidas do banco de dados
        foreach ($ras as $ra) {
            echo "<option value=\"$ra\">$ra</option>";
        }
        ?>
    </select><br>
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

    <label for="nota1">Nota 1:</label>
    <input type="text" id="nota1" name="nota1" required><br><br>

    <label for="nota2">Nota 2:</label>
    <input type="text" id="nota2" name="nota2" required><br><br>

    <label for="nota3">Nota 3:</label>
    <input type="text" id="nota3" name="nota3" required><br><br>

    <label for="faltas">Faltas:</label>
    <input type="text" id="faltas" name="faltas" required><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>