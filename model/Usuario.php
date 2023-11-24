<?php

class Usuario{
    
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    
    function getID() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }


    function getSenha() {
        return $this->senha;
    }

    function setID($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }


    function setSenha($senha) {
        $this->senha = $senha;
    }

    
}
