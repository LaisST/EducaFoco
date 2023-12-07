<?php
    require_once 'Conexao.php';
    require_once '../model/Evento.php';
    require_once '../controller/EventoController.php';

    class EventoDAO{
        private $banco;

        public function __construct(){

            $this->banco = new Conexao();

        }

        public function exibir_eventos($ra){
            
            $exibir = $this->banco->getConexao()->prepare("SELECT * FROM calendario WHERE RA = '".$ra."'");
            $exibir->execute();
            $result = $exibir->get_result(); // Obtém o resultado da consulta
            $eventos = [];
        
            while ($row = $result->fetch_assoc()) {
                $eventos[] = $row;
            }
        
            return json_encode($eventos);
        }

        public function adicionar_evento($evento){


            $sqlInsert = "INSERT INTO calendario (RA, title, description, color, start, end)
            values ('".$evento->getRa()."', '".$evento->getTitle()."', '".$evento->getDescription()."', '".$evento->getColor()."', '".$evento->getStart()."', '".$evento->getEnd()."')";
            
            $result = mysqli_query($this->banco->getConexao(),$sqlInsert);
            // if($result){
            //     echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
            // }else{
            //     echo "<pre>";
            //     echo "An Error occured.<br>";
            //     echo "SQL: ".$sqlInsert."<br>";
            //     echo "</pre>";
            // }
            $this->banco->desconectar();

            return $result > 0;
        }

        public function exibir_evento_ID($id){
            
            $exibir = $this->banco->getConexao()->prepare("SELECT * FROM calendario WHERE id = '".$id."'");
            $exibir->execute();
            $result = $exibir->get_result(); // Obtém o resultado da consulta
            return  $result->fetch_assoc();
        
        }

        public function editar_evento($evento){

            $editar = $this->banco->getConexao()->prepare("UPDATE calendario SET title = '".$evento->getTitle()."', description = '".$evento->getDescription()."' , color = '".$evento->getColor()."' , start = '".$evento->getStart()."' , end = '".$evento->getEnd()."'  WHERE id = '".$evento->getId()."'");
            $editar->execute();
            $this->banco->desconectar();

        }


        public function deletar_evento($id){
            $excluir = $this->banco->getConexao()->prepare("DELETE FROM calendario WHERE id = '".$id."'");
            $excluir->execute();
            $this->banco->desconectar();

        }
        

    }