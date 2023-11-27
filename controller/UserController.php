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

}else if(isset($_POST['excluir'])) { 

  $usuario = new Usuario();
    $usuario->setID($_POST['id_del']);

    if ($userdao->excluir($usuario)) {
        // Redirecionar para a página de destino após a exclusão
        $usuario->setID($_POST['id_del']);

        if($userdao->excluir($usuario)) {
    
        echo "<script>
                alert('Usuário Deletado com Sucesso!!');
                location.href = '../views/index.html';
            </script>";
        }
    }
} else if(isset($_POST['login'])) {

  $usuario->setEmail(strip_tags($dados['mail']));
  $usuario->setSenha(strip_tags($dados['senha'])); 

     // Verifica o login e armazena os detalhes do usuário na sessão se for bem-sucedido
     $userDetails = $userdao->login($usuario);

     if ($userDetails) {
      $_SESSION['user_id'] = $userDetails['id_usuario'];
      $_SESSION['user_name'] = $userDetails['nome'];
      $_SESSION['user_phone'] = $userDetails['telefone']; 
      $_SESSION['user_email'] = $userDetails['email'];
      header("Location: ../views/home.php");
      exit();
  } else {
      echo "<script>
          alert('Acesso inválido! login ou senha incorretos!');
      </script>";
  }


} else if (isset($_GET['sair'])) {
  
    $userdao->sair();
} 