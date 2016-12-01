<?php

class Usuario extends MainModel {

    protected $id;
    protected $login;
    protected $nome;
    protected $senha;
    protected $email;
    protected $perfil;
    protected $ultimoLogin; 
    protected $tokenLogin;
    protected $validadeToken;
    protected $status;

    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getUltimoLogin() {
        return $this->ultimoLogin;
    }

    function getTokenLogin() {
        return $this->tokenLogin;
    }

    function getValidadeToken() {
        return $this->validadeToken;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setUltimoLogin($ultimoLogin) {
        $this->ultimoLogin = $ultimoLogin;
    }

    function setTokenLogin($tokenLogin) {
        $this->tokenLogin = $tokenLogin;
    }

    function setValidadeToken($validadeToken) {
        $this->validadeToken = $validadeToken;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}
