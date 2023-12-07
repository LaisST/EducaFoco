<?php
    class Evento{
        // Propriedades (variáveis)
        private $id;
        private $ra;
        private $title;
        private $description;
        private $color;
        private $start;
        private $end;

        //Contrutor da classe
        public function __construct($id=null, $ra=null, $title=null, $description=null, $color=null,$start=null, $end=null){
            $this->id = $id;
            $this->ra = $ra;
            $this->title = $title;
            $this->description = $description;
            $this->color = $color;
            $this->start = $start;
            $this->end = $end;

        }

        // Método para obter e definir os objetos
        //Getters and Setters
        
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getRa(){
            return $this->ra;
        }

        public function setRa($ra){
            $this->ra = $ra;
            return $this;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setTitle($title){
            $this->title = $title;
            return $this;
        }

        public function getDescription(){
            return $this->description;
        }


        public function setDescription($description){
            $this->description = $description;
            return $this;
        }

        public function getColor(){
            return $this->color;
        }


        public function setColor($color){
            $this->color = $color;
            return $this;
        }

        public function getStart(){
            return $this->start;
        }

        public function setStart($start){
            $this->start = $start;
            return $this;
        }

        public function getEnd(){
            return $this->end;
        }

        public function setEnd($end){
            $this->end = $end;
            return $this;
        }
    }
