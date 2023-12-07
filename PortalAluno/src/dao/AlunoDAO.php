<?php
    require_once 'Conexao.php';
    require_once '../model/Aluno.php';

    class AlunoDAO{
        private $banco;

        public function __construct(){

            $this->banco = new Conexao();

        }

        public function logar($aluno){

            $sql = "SELECT * FROM `aluno` WHERE `RA` = '".$aluno->getRa()."' AND `senha` = '".$aluno->getSenha()."' LIMIT 1";
            $result = mysqli_query($this->banco->getConexao(), $sql);
            $this->banco->desconectar();

            if(mysqli_num_rows($result) > 0){

                while($element = mysqli_fetch_assoc($result)){

                    $aluno = new Aluno();

                    $aluno->setRa($element['RA']);
                    $aluno->setNome($element['nome']);
                    $aluno->setEmail($element['email']);
                    $aluno->setSenha($element['senha']);
                    $aluno->setData_expiracao_senha($element['data_expiracao_senha']);

                    return $aluno;

                }
            }

            return null;
        }

        public function cadastrar($aluno){

        
            $sqlInsert = "INSERT INTO aluno (RA, nome, cpf, data_nascimento, telefone, email, senha, data_expiracao_senha)
            values ('".$aluno->getRa()."', '".$aluno->getNome()."', '".$aluno->getCpf()."', '".$aluno->getData_nascimento()."', '".$aluno->getTelefone()."', '".$aluno->getEmail()."', '".$aluno->getSenha()."', '".$aluno->getData_expiracao_senha()."')";
            
            $result = mysqli_query($this->banco->getConexao(),$sqlInsert);

            $this->banco->desconectar();

            return $result > 0;

            
        }

        public function existe_aluno($RA, $email){
            $sql = "SELECT RA FROM `aluno` WHERE `RA` = '".$RA."' AND email LIKE '".$email."' LIMIT 1";

            $result = mysqli_query($this->banco->getConexao(), $sql);

            return mysqli_num_rows($result) > 0;

        }

        public function existe_token($token){
            $sql = "SELECT RA FROM `aluno` WHERE `token` = '".$token."' AND `expiracao_token` > NOW() LIMIT 1";

            $result = mysqli_query($this->banco->getConexao(), $sql);


            return mysqli_num_rows($result) > 0;
            
        }

        public function salvar_token($RA, $email, $token){
           $sqlUpdate = "UPDATE aluno SET token = '".$token."', expiracao_token = DATE_ADD(NOW(), INTERVAL 24 HOUR) WHERE email LIKE '".$email."' AND RA = '".$RA."'";

            $result = mysqli_query($this->banco->getConexao(), $sqlUpdate);
            $this->banco->desconectar();

            return $result > 0;
        }

        public function alterar_senha($token, $senha, $dataFutura){
            $sqlUpdate = "UPDATE aluno SET senha = '".$senha."', data_expiracao_senha = '".$dataFutura."' WHERE token = '".$token."'";

            $result = mysqli_query($this->banco->getConexao(), $sqlUpdate);
            $this->banco->desconectar();
            echo 'ok';
            return $result > 0;
        }

        public function alterar_senha_logado($RA,$senha, $dataFutura){
            $sqlUpdate = "UPDATE aluno SET senha = '".$senha."', data_expiracao_senha = '".$dataFutura."' WHERE RA = '".$RA."'";

            $result = mysqli_query($this->banco->getConexao(), $sqlUpdate);
            $this->banco->desconectar();
            echo 'ok';
            return $result > 0;
        }


        public function exibir_horario($RA){
            $sql = "SELECT d.nome_disciplina, p.nome, s.dia_semana, h.hora AS inicio, hf.hora AS fim
            FROM matricula
            inner join horario_disciplina AS hd ON (matricula.cod_disciplina = hd.cod_disciplina)
            INNER JOIN disciplina AS d ON (hd.cod_disciplina = d.cod_disciplina)
            INNER JOIN professor AS p ON (d.cod_professor = p.cod_professor)
            INNER JOIN dia_semana AS s ON (hd.cod_dia_semana = s.cod_dia_semana)
            INNER JOIN horario AS h ON (hd.horario_inicio = h.cod_horario)
            INNER JOIN horario AS hf ON (hd.horario_fim = hf.cod_horario)
            WHERE RA = '".$RA."' AND aprovado = 0
            order by s.cod_dia_semana, h.cod_horario";

            $result = mysqli_query($this->banco->getConexao(), $sql) or die("Erro ao retornar os dados.");
            mysqli_close($this->banco->getConexao());
            return $result;

        }

        public function exibir_notas_faltas($RA){
            $sql = "SELECT
            disciplina.nome_disciplina,
            matricula.nota1,
            matricula.nota2,
            matricula.nota3,
            matricula.faltas
        FROM matricula
        INNER JOIN disciplina ON matricula.cod_disciplina = disciplina.cod_disciplina
        
        WHERE matricula.RA = '".$RA."'
        order by disciplina.semestre;";

            $result = mysqli_query($this->banco->getConexao(), $sql) or die("Erro ao retornar os dados.");
            mysqli_close($this->banco->getConexao());
            return $result;

        }

        public function exibir_historico($RA){
            $sql = "SELECT
			disciplina.cod_disciplina,
            disciplina.nome_disciplina,
            historico.media_final,
            historico.frequencia,
            historico.aprovado,
            historico.observacao
        FROM historico
        INNER JOIN disciplina ON historico.cod_disciplina = disciplina.cod_disciplina
        WHERE historico.RA = '".$RA."'
        ORDER BY disciplina.semestre;";

            $result = mysqli_query($this->banco->getConexao(), $sql) or die("Erro ao retornar os dados.");
            mysqli_close($this->banco->getConexao());
            return $result;

        }

        //Lançamento de Notas e Faltas

        public function lancar_notas_faltas($ra, $disciplina, $nota1, $nota2, $nota3, $faltas){
            $sqlUpdate = "UPDATE matricula 
            SET 
            nota1 = '".$nota1."',
            nota2 = '".$nota2."',
            nota3 = '".$nota3."',
            faltas = '".$faltas."'
            WHERE ra LIKE '".$ra."' AND cod_disciplina = '".$disciplina."';";

            $result = mysqli_query($this->banco->getConexao(), $sqlUpdate);
            $this->banco->desconectar();

            return $result > 0;
        }

        //Ementa disciplinas
        public function exibir_ementa_disciplina($RA){
            
            $sql = "SELECT disciplina.nome_disciplina, professor.nome, ementa_disciplina.ementa, ementa_disciplina.objetivo
            FROM matricula
            INNER JOIN ementa_disciplina ON (ementa_disciplina.cod_disciplina = matricula.cod_disciplina)
            INNER JOIN disciplina ON (disciplina.cod_disciplina = ementa_disciplina.cod_disciplina)
            INNER JOIN professor ON (disciplina.cod_professor = professor.cod_professor)
            WHERE RA = '".$RA."'";

            $result = mysqli_query($this->banco->getConexao(), $sql);
            $this->banco->desconectar();

            return $result;
        }

        //Consultar semestre
        public function exibir_semestre($RA){
            $sql = "SELECT 

                    ra_semestre.semestre_mais_frequente
                FROM 
                    matricula m
                LEFT JOIN 
                    disciplina d ON m.cod_disciplina = d.cod_disciplina
                LEFT JOIN 
                    (
                        SELECT 
                            m.ra, 
                            d.semestre AS semestre_mais_frequente
                        FROM 
                            matricula m
                        JOIN 
                            disciplina d ON m.cod_disciplina = d.cod_disciplina
                        JOIN (
                            SELECT 
                                m.ra,
                                d.semestre,
                                RANK() OVER (PARTITION BY m.ra ORDER BY COUNT(*) DESC) AS rnk
                            FROM 
                                matricula m
                            JOIN 
                                disciplina d ON m.cod_disciplina = d.cod_disciplina
                            GROUP BY 
                                m.ra, d.semestre
                        ) ranked ON m.ra = ranked.ra AND d.semestre = ranked.semestre
                        WHERE 
                            rnk = 1
                    ) ra_semestre ON m.ra = ra_semestre.ra
                WHERE 
                    m.ra = '".$RA."';";

            $result = mysqli_query($this->banco->getConexao(), $sql);
            

            return $result;
        }

        //Consultar a % de aprovação 
        public function exibir_PP($RA){
            $sql = "SELECT
                    RA,
                    FORMAT((SUM(CASE WHEN aprovado = 1 THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) AS percentual_aprovacao
                    FROM
                    historico
                    WHERE
                    ra = '".$RA."'
                    GROUP BY
                    RA;
                    ";
            $result = mysqli_query($this->banco->getConexao(), $sql);
            

            return $result;


        }

        public function exibir_pr($RA){
            $sql = "SELECT FORMAT(AVG(media_final),1) AS PR
                    FROM historico
                    WHERE RA = '".$RA."' and aprovado = 1;";

            $result = mysqli_query($this->banco->getConexao(), $sql);
            return $result;


        }

        
    }

