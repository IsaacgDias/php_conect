<?php 

require_once('../database/Conexao.php');
require_once('../dao/UserDao.php');
require_once('../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

//pega todos os dados passado por POST

$dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $usuario->setNome($dados['nome']);
    $usuario->setTelefone($dados['telefone']);
    $usuario->setEmail($dados['mail']);
    $usuario->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 

    if($userdao->criar($usuario)) {

    echo "<script>
            alert('Usuário Cadastrado com Sucesso!!');
            location.href = '../';
          </script>";

    } 

} else if(isset($_POST['login'])) {

  $usuario->setEmail(strip_tags($dados['mail']));
  $usuario->setSenha(strip_tags($dados['senha'])); 

    $userdao->login($usuario);

  if($userdao->login($usuario)) {

     echo "<script>        
            alert('Sucesso!');
            location.href = '../views/home.html';
           </script>";

  } else {
        echo "<script>
                alert('Acesso inválido! login ou senha incorretos!');
            </script>";
  }	

} 