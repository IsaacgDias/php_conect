<?php
session_start();

class UserDao {
// Cadastra o usuário
public function criar(Usuario $usuario) {
    try {

        $sql = "INSERT INTO usuario (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":telefone", $usuario->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
        
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao Inserir usuario <br>" . $e->getMessage() . '<br>';
    }
}

// Editar usuário
public function editar(Usuario $usuario) {
    try {
        $sql = "UPDATE usuario SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id_usuario = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":telefone", $usuario->getTelefone(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(":id", $usuario->getID(), PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao editar usuário: " . $e->getMessage();
        return false;
    }
}

//Deletar usuário
public function excluir(Usuario $usuario) {
    try {

        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $usuario->getID(), PDO::PARAM_INT);
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao Excluir usuario" . $e->getMessage();
    }
}

// Login
public function login(Usuario $usuario) {
    try {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->execute();
        $user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
                
        if ($stmt->rowCount() == 1) {
            if (password_verify($usuario->getSenha(), $user_linha['senha'])) {
                // Retorna os detalhes do usuário quando o login for bem-sucedido
                return $user_linha;
            }
        }   
        
    }
    catch(PDOException $e) {

        echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
    }
}

public function sair() {
    // Inicia a sessão se ainda não tiver sido iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Unset das variáveis de sessão
    $_SESSION = array();

    // Finaliza a sessão
    session_destroy();

    // Redireciona para a página de login ou outra página desejada após o logout
    header("Location: ../views/index.html");
    exit();
}

}
?>