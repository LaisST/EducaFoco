<?php
    require_once '../model/Evento.php';
    require_once '../dao/EventoDAO.php';
    require_once 'AlunoController.php';


class EventoController{

    private $eventoDAO;

    public function __construct(){
        $this->eventoDAO = new EventoDAO();
    }

    public function exibir_eventos(){
        $ra = unserialize($_SESSION['aluno'])->getRa();
        echo $this->eventoDAO->exibir_eventos($ra);
    }

    public function adicionar_evento(){
        $evento = New Evento();
        
        $ra = unserialize($_SESSION['aluno'])->getRa();

        $evento->setRa($ra);
        $evento->setStart($_POST['start']);
        $evento->setTitle($_POST['title']);
        $evento->setDescription($_POST['description']);
        $evento->setColor($_POST['color']);
    
        if($_POST['end'] <= $evento->getStart()){
            $end = date('Y-m-d H:i:s', strtotime($_POST['start'] . ' +1 minute'));
            $evento->setEnd($end);
        }else{
            $evento->setEnd($_POST['end']);
        }

        $result = $this->eventoDAO->adicionar_evento($evento);

        

        if(!is_null($result)){
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento cadastrado com sucesso!')
            window.location.href='../view/calendario_aluno.php'</script>";

        }else{

            echo "<script language='javascript' type='text/javascript'>
            alert('Evento não cadastrado! Tente novamente')
            window.location.href='../view/calendario_aluno.php'</script>";

        }
       

    }


    public function exibir_evento_ID(){
        $evento = $this->eventoDAO->exibir_evento_ID($_GET['id']);

        return $evento;
    }


    public function editar_evento(){

        $evento = new Evento();
        $evento->setId($_POST['id']);
        $evento->setStart($_POST['start']);
        $evento->setTitle($_POST['title']);
        $evento->setDescription($_POST['description']);
        $evento->setColor($_POST['color']);
    
        if($_POST['end'] <= $evento->getStart()){
            $end = date('Y-m-d H:i:s', strtotime($_POST['start'] . ' +1 minute'));
            $evento->setEnd($end);
        }else{
            $evento->setEnd($_POST['end']);
        }
        
        $result = $this->eventoDAO->editar_evento($evento);
        
        if(is_null($result)){
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento alterado com sucesso!')
            window.location.href='../view/calendario_aluno.php'</script>";

        }else{

            echo "<script language='javascript' type='text/javascript'>
            alert('Evento não alterado! Tente novamente')
            </script>";

        }

       
    }

    public function deletar_evento(){
        
        // $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        $id = $_GET['id'];
        $result = $this->eventoDAO->deletar_evento($id);

        if(is_null($result)){
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento excluido com sucesso!')
            window.location.href='../view/calendario_aluno.php'</script>";

        }else{

            echo "<script language='javascript' type='text/javascript'>
            alert('Evento não excluido! Tente novamente')
            </script>";

        }

    }
    




}

if(isset($_GET['acao'])){

$acao = $_GET['acao'];
$eventoController = new EventoController();

switch($acao){
    case "exibir_eventos":
        $eventoController->exibir_eventos();
        break;

    case "adicionar_evento":
        $eventoController->adicionar_evento();
        break;
    
    case "editar_evento":
        $eventoController->editar_evento();
        break;

    case "deletar_evento":
        if(isset($_GET['id'])){
            $eventoController->deletar_evento();
        }
        break;
    }


}





