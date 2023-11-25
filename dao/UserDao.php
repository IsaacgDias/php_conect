<?php
session_start();

class UserDao {

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

public function login(Usuario $usuario) {
    try {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->execute();
        $user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
                
        if($stmt->rowCount() == 1) {

            if(password_verify($usuario->getSenha(), $user_linha['senha'])) {

                $_SESSION['user_session'] = $user_linha['id_usuario'];
                return true;
                
            } else {
                return false;
            }
        }
    }
    catch(PDOException $e) {

        echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
    }
}

}
?>