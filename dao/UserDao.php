<?php

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

}
?>