<?php

class Aluno {
    // Propriedades (variáveis)
    private $ra;
    private $nome;
    private $cpf;
    private $data_nascimento;
    private $email;
    private $telefone;
    private $senha;
    private $data_expiracao_senha;
    private $senha_primeiro_acesso;
    

    // Construtor da classe
    public function __construct($ra = null, $nome = null, $cpf = null, $data_nascimento = null, $email = null, $telefone = null, $senha = null, $data_expiracao_senha = null) {
        $this->ra = $ra;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
        $this->data_expiracao_senha = $data_expiracao_senha;
    }
    // Método para obter o nome do aluno
    public function getRa() {
        return $this->ra;
    }

    public function getNome() {
        return $this->nome;
    }

public function getCpf() {
    return $this->cpf;
}

    public function getData_nascimento() {
        return $this->data_nascimento;
    }

public function getEmail() {
    return $this->email;
}

    public function getTelefone() {
        return $this->telefone;
    }

public function getSenha() {
    return $this->senha;
}

    // Método para definir o nome do aluno
    public function setRA($ra) {
        $this->ra = $ra;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }


    public function getData_expiracao_senha(){
        
        return $this->data_expiracao_senha;

    }

    public function setData_expiracao_senha($data_expiracao_senha){

        $this->data_expiracao_senha = $data_expiracao_senha;

    }

    public function getSenha_primeiro_acesso(){

        return $this->senha_primeiro_acesso;

    }

    public function setSenha_primeiro_acesso($senha_primeiro_acesso){
        
        $this->senha_primeiro_acesso = $senha_primeiro_acesso;

    }
}