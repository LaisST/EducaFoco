<?php
    require_once '../model/Aluno.php';
    require_once '../dao/AlunoDAO.php';
    require_once '../utilitarios/EnvioEmail.php';

    if(!isset($_SESSION['aluno'])){
        session_start();
    }

    class AlunoController{

        private $alunoDAO;
        private $envioEmail;

        public function __construct(){

            $this->alunoDAO = new AlunoDAO();
            $this->envioEmail = new EnvioEmail();
            
        }

        public function cadastrar(){
            date_default_timezone_set('America/Sao_Paulo');
            $aluno = new Aluno();

            $dataAtualObj = new DateTime();
            $dataAtual = $dataAtualObj->format('Y-m-d H:i:s');
            $dataFuturaObj = new DateTime($dataAtual);
            $dataFuturaObj->add(new DateInterval('P90D'));
            $dataFutura = $dataFuturaObj->format('Y-m-d H:i:s');    

            $aluno->setRA($_POST['ra']);
            $aluno->setNome($_POST['nome']);
            $aluno->setCpf($_POST['cpf']);
            $aluno->setData_nascimento($_POST['data_nascimento']);
            $aluno->setTelefone($_POST['telefone']);
            $aluno->setEmail($_POST['email']);
            $aluno->setSenha(mt_rand(100000, 999999));
            $aluno->setSenha_primeiro_acesso($aluno->getSenha());
            $aluno->setData_expiracao_senha($dataFutura);
            $aluno->setSenha(hash('sha256', $aluno->getSenha()));

            $result = $this->alunoDAO->cadastrar($aluno);

            if(!is_null($result)){

                $this->envioEmail->enviarEmail($aluno->getEmail(), 'Cadastro', $this->corpo_email_cadastro($aluno));
                
                echo "<script language='javascript' type='text/javascript'>
                alert('Aluno cadastrado com sucesso!')
                window.location.href='../view/login-estudante.php'</script>";

            }else{

                echo "<script language='javascript' type='text/javascript'>
                alert('Aluno não cadastrado!')
                window.location.href='../view/cadastro_aluno.php'</script>";

            }
        }

        public function corpo_email_cadastro($aluno){
            $nomeCompleto = $aluno->getNome();
            $nomeSeparado = explode(' ', $nomeCompleto);

            $corpo_email_cadastro = "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Bem vindo, aluno!</title>
            </head>
            <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
                <div style='max-width: 800px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                <h1>Bem-vindo(a) a FATEC FERRAZ DE VASCONCELOS!</h1>
                
                <p>Olá ".$nomeSeparado[0].",</p>
            
                <p>Seu cadastro foi concluído com sucesso em nossa instituição. Abaixo estão os detalhes:</p>
            
                <ul>
                    <li><strong>Nome:</strong> ".$aluno->getNome()."</li>
                    <li><strong>RA:</strong> ".$aluno->getRA()."</li>
                    <li><strong>Senha Provisória:</strong> ".$aluno->getSenha_primeiro_acesso()."</li>
                </ul>
            
                <p>Com essas informações, você pode acessar nosso sistema e começar a utilizar os recursos disponíveis. Recomendamos que você altere sua senha provisória após o primeiro login para garantir a segurança da sua conta.</p>
            
                <p>Para fazer o login, visite nossa página de login em: <a href='http://localhost/portalAluno/src/view/login-estudante.php' ' style='background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Página de Login</a></p>
            
                <p>Agradecemos por escolher nossa instituição. Se tiver alguma dúvida ou precisar de assistência, não hesite em entrar em contato conosco.</p>
            
                <p>Atenciosamente,<br>
                Secretaria <br>
                Fatec Ferraz de Vasconcelos<br>
                Equipe EducaFoco<br>
                </p>
            </div>
            </body>
            </html>";

            return $corpo_email_cadastro;
        }

        public function corpo_email_recuperar_senha($link){


            $corpo_email_recuperar_senha = "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Recuperação de senha!</title>
            </head>
            <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
                <div style='max-width: 800px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                    <h1>Recuperação de Senha</h1>
                    <p>Olá,</p>
                    <p>Recebemos uma solicitação para redefinir sua senha. Clique no link abaixo para criar uma nova senha:</p>
                    <p><a href='".$link."' style='background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Redefinir Senha</a></p>
                    <p>Se você não solicitou uma redefinição de senha, pode ignorar este e-mail com segurança.</p>
                    <p>Obrigado,</p>
                    <p>Atenciosamente,<br>
                    Secretaria <br>
                    Fatec Ferraz de Vasconcelos<br>
                    Equipe EducaFoco<br>
                    </p>
                </div>
            </body>
            </html>
            ";

            return $corpo_email_recuperar_senha;
        }

        public function corpo_email_revisao_notas($disciplina, $justificativa, $aluno){



            $corpo_email_revisao_notas = "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Solicitação de Revisão de Notas</title>
                </head>
                <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>

                    <div style='max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                        <h2 style='color: #3829e0; text-align: center;'>Solicitação de Revisão de Notas</h2>
                        <p><strong>RA: </strong>" .$aluno->getRA()."</p>
                        <p><strong>Nome: </strong>" .$aluno->getNome()."</p>
                        <p><strong>Disciplina: </strong>" .$disciplina."</p>
                        <p><strong>Justificativa: </strong> ".$justificativa."</p>
                        <hr style='border: 1px solid #ddd;'>

                        <p style='color: #888; font-size: 12px; text-align: center;'>Solicitação enviada via EDUCAFOCO.</p>
                    </div>

                </body>
                </html>

            ";

            return $corpo_email_revisao_notas;
        }

        public function corpo_email_revisao_faltas($disciplina, $justificativa, $aluno){



            $corpo_email_revisao_faltas = "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Solicitação de Revisão de Faltas</title>
                </head>
                <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>

                    <div style='max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                        <h2 style='color: #3829e0; text-align: center;'>Solicitação de Revisão de Faltas</h2>
                        <p><strong>RA: </strong>" .$aluno->getRA()."</p>
                        <p><strong>Nome: </strong>" .$aluno->getNome()."</p>
                        <p><strong>Disciplina: </strong>" .$disciplina."</p>
                        <p><strong>Justificativa: </strong> ".$justificativa."</p>
                        <hr style='border: 1px solid #ddd;'>

                        <p style='color: #888; font-size: 12px; text-align: center;'>Solicitação enviada via EDUCAFOCO.</p>
                    </div>

                </body>
                </html>

            ";

            return $corpo_email_revisao_faltas;
        }

        public function corpo_email_solicitacao_documento($tipo_documento, $aluno){



            $corpo_email_revisao_faltas = "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Solicitação de Documento</title>
                </head>
                <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>

                    <div style='max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                        <h2 style='color: #3829e0; text-align: center;'>Solicitação de Documento</h2>
                        <p><strong>RA: </strong>" .$aluno->getRA()."</p>
                        <p><strong>Nome: </strong>" .$aluno->getNome()."</p>
                        <p><strong>Tipo de documento: </strong>" .$tipo_documento."</p>
                        <hr style='border: 1px solid #ddd;'>

                        <p style='color: #888; font-size: 12px; text-align: center;'>Solicitação enviada via EDUCAFOCO.</p>
                    </div>

                </body>
                </html>

            ";

            return $corpo_email_revisao_faltas;
        }



        public function logar(){

            $aluno = new Aluno();
            $dataAtualObj = new DateTime();
            $dataAtual = $dataAtualObj->format('Y-m-d H:i:s');

            $aluno->setRA($_POST['ra']);
            $senhaCriptografada = hash('sha256', $_POST['senha']);
            $aluno->setSenha($senhaCriptografada);

            $result = $this->alunoDAO->logar($aluno);

            if(!is_null($result)){
                $_SESSION['aluno'] = serialize($result);

                if($result->getData_expiracao_senha() <= $dataAtual){

                    echo "<script language='javascript' type='text/javascript'>
                    alert('Sua senha expirou! Altere para uma nova senha.')
                    window.location.href='../view/alterar_senha_logado.php'</script>";
                
                }else{

                    header('location:../view/home.php');
                }

            }else{
                
                echo "<script language='javascript' type='text/javascript'>
                alert('RA ou Senha inválidos. Por favor, tente novamente')
                window.location.href='../view/login-estudante.php'</script>";

            }

        }

        public function logout(){

            if (isset($_SESSION['aluno'])) {

                session_destroy();
                header("Location:../../index.php");
                exit;

            } else {

                echo "Você não está logado.";

            }
        }

        public function enviar_token(){
            if(isset($_GET["acao"])){

                $RA = $_POST["ra"];
                $email = $_POST["email"];

                if ($this->existe_aluno($RA, $email)) {

                    // Gerar um token de redefinição de senha único
                    $token = "";

                    do{

                        $token = bin2hex(random_bytes(32));

                    }while($this->existe_token($token));

                    // Armazenar o token na base de dados junto com o e-mail e uma data de expiração

                    $this->salvar_token($RA, $email, $token);

                    // // Enviar um e-mail com um link de redefinição de senha

                    $link = "http://localhost/portalAluno/src/view/alterar_senha_token.php?token=$token";
                    $this->envioEmail->enviarEmail($email, "Redefinir Senha do Portal do Aluno", $this->corpo_email_recuperar_senha($link));

                    /*$mensagem = "Clique no link a seguir para redefinir sua senha: $link";
                    mail($email, "Redefinição de Senha", $mensagem);*/

                    echo "<script language='javascript' type='text/javascript'>
                    alert('Um e-mail com instruções para redefinir sua senha foi enviado para o seu endereço de e-mail.')
                    window.location.href='../view/login-estudante.php'</script>";

                } else {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('O e-mail fornecido não foi encontrado em nossa base de dados.')
                    window.location.href='../view/login-estudante.php'</script>";

                }
            }
        }

        public function existe_aluno($RA, $email){
            $existeAluno = $this->alunoDAO->existe_aluno($RA, $email);

            return $existeAluno;
        }

        public function existe_token($token){
            $existeToken = $this->alunoDAO->existe_token($token);

            return $existeToken;
        }

        public function salvar_token($RA, $email, $token){
            $salvarToken = $this->alunoDAO->salvar_token($RA, $email, $token);

            return $salvarToken;
        }

        public function alterar_senha(){
            date_default_timezone_set('America/Sao_Paulo');
            $dataAtualObj = new DateTime();
            $dataAtual = $dataAtualObj->format('Y-m-d H:i:s');
            $dataFuturaObj = new DateTime($dataAtual);
            $dataFuturaObj->add(new DateInterval('P90D'));
            $dataFutura = $dataFuturaObj->format('Y-m-d H:i:s');  
            
            $token = $_COOKIE['token'];
            $senha = hash('sha256', $_POST['senha']);
            $this->alunoDAO->alterar_senha($token, $senha, $dataFutura);

                echo "<script language='javascript' type='text/javascript'>
                alert('Senha alterada com sucesso!')
                window.location.href='../view/login-estudante.php'</script>";

            }

        public function alterar_senha_logado(){
            date_default_timezone_set('America/Sao_Paulo');
            $dataAtualObj = new DateTime();
            $dataAtual = $dataAtualObj->format('Y-m-d H:i:s');
            $dataFuturaObj = new DateTime($dataAtual);
            $dataFuturaObj->add(new DateInterval('P90D'));
            $dataFutura = $dataFuturaObj->format('Y-m-d H:i:s');  

            $RA = unserialize($_SESSION['aluno'])->getRA();
            $senhaBanco = unserialize($_SESSION['aluno'])->getSenha();

            $senhaAntiga = hash('sha256', $_POST['senha_antiga']);
            $senha = hash('sha256', $_POST['senha']);

            if($senhaBanco == $senhaAntiga){
                $result = $this->alunoDAO->alterar_senha_logado($RA, $senha, $dataFutura);

                if($result){
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Senha alterada com sucesso!')
                    window.location.href='../view/home.php'</script>";
                }else{
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Senha Não alterada!')
                    window.location.href='../view/home.php'</script>";

                }
                

            }else{

                echo "<script language='javascript' type='text/javascript'>
                alert('Senha Antiga inválida. Por favor, tente novamente')
                window.location.href='../view/alterar_senha_logado.php'</script>";

            }


        }

                
        //Disciplinas

        //Horario
        public function exibir_horario(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_horario($RA);
        }

        //Notas e Faltas
        public function exibir_notas_faltas(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_notas_faltas($RA);
        }

        //Historico
        public function exibir_historico(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_historico($RA);
        }

        //Ementa Disciplina
        public function exibir_ementa_disciplina(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_ementa_disciplina($RA);

        }

        //Lançamento de Notas e Faltas
        public function lancar_notas_faltas(){
            $ra = $_POST["ra"];
            $disciplina = $_POST["disciplina"];
            $nota1 = $_POST["nota1"];
            $nota2 = $_POST["nota2"];
            $nota3 = $_POST["nota3"];
            $faltas = $_POST["faltas"];

            return $this->alunoDAO->lancar_notas_faltas($ra, $disciplina, $nota1, $nota2, $nota3, $faltas);

        }



        //Solicitação revisão notas
        
        public function solicitar_revisao_nota(){
            $disciplina = $_POST['disciplina'];
            $justificativa =$_POST['justificativa'];
            if(isset($_SESSION['aluno'])){
                $aluno = unserialize($_SESSION['aluno']);
            }
            $solicitacao = $this->envioEmail->enviarEmail('laiscostast2@gmail.com', 'Solicitacao de Revisao de Notas', $this->corpo_email_revisao_notas($disciplina, $justificativa, $aluno));
            
            if($solicitacao){
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação enviada com sucesso')
                window.location.href='../view/home.php'</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação não enviada, tente novamente.')
                window.location.href='../view/home.php'</script>";
            }
            
        }

        public function solicitar_revisao_falta(){
            $disciplina = $_POST['disciplina'];
            $justificativa =$_POST['justificativa'];
            if(isset($_SESSION['aluno'])){
                $aluno = unserialize($_SESSION['aluno']);
            }
            $solicitacao = $this->envioEmail->enviarEmail('laiscostast2@gmail.com', 'Solicitacao de Revisao de Faltas', $this->corpo_email_revisao_faltas($disciplina, $justificativa, $aluno));
            
            if($solicitacao){
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação enviada com sucesso')
                window.location.href='../view/home.php'</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação não enviada, tente novamente.')
                window.location.href='../view/home.php'</script>";
            }
            
        }

        public function solicitar_documento(){
            if(isset($_SESSION['aluno'])){
                $aluno = unserialize($_SESSION['aluno']);
            }
            $tipo_documento = $_POST['documento'];
            $solicitacao = $this->envioEmail->enviarEmail('laiscostast2@gmail.com', 'Solicitacao de Documento', $this->corpo_email_solicitacao_documento($tipo_documento, $aluno));
            
            if($solicitacao){
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação enviada com sucesso')
                window.location.href='../view/home.php'</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert('Solicitação não enviada, tente novamente.')
                window.location.href='../view/home.php'</script>";
            }

        }


        //Exibir Semestre
        public function exibir_semestre(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_semestre($RA);
        }

        //Exibir PP
        public function exibir_pp(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_pp($RA);
        }

        //Exibir PP
        public function exibir_pr(){
            if(isset($_SESSION['aluno'])){
                $RA = unserialize($_SESSION['aluno'])->getRA();
            }
            return $this->alunoDAO->exibir_pr($RA);
        }



    }
            




        
        
        
    

    if(isset($_GET['acao'])){

        $acao = $_GET['acao'];
        $alunoController = new AlunoController();

        switch($acao){
            case "login":
                $alunoController->logar();
                break;

            case "logout":
                $alunoController->logout();
                break;

            case "cadastrar":
                $alunoController->cadastrar();
                break;

            case "enviar_token":
                $alunoController->enviar_token();
                break;

            case "alterar_senha":
                $alunoController->alterar_senha();
                break;

            case "alterar_senha_logado":
                $alunoController->alterar_senha_logado();
                break;

            case "lancar_notas_faltas":
                $alunoController->lancar_notas_faltas();
                break;

            case "solicitar_revisao_nota":
                $alunoController->solicitar_revisao_nota();
                break;

            case "solicitar_revisao_falta":
                $alunoController->solicitar_revisao_falta();
                break;

            case "solicitar_documento":
                $alunoController->solicitar_documento();
                break;
                
        
            

        }
    }
?>
