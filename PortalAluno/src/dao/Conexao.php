<?php

    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'portalaluno');

    class Conexao{

        private $conexao;

        public function __construct(){
            $this->conectar();
        }

        private function conectar(){
            $this->conexao = mysqli_connect(HOST,USUARIO,SENHA,DB);
        }

        public function getConexao(){
            return $this->conexao;
        }

        public function desconectar(){
            
            try{
                
                mysqli_close($this->conexao);

            }catch(Exception $e){

            }
        }
        
    }

