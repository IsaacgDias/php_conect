<?php
session_start();
?>
<style>
    *{
    text-decoration: none;
    color: inherit;
}
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.detalhesUsuario {
    width: 700px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-top: 50px; 
}

.dados {
    width: 100%;
    margin: auto;
}

.campos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.campo {
    flex: 0 0 calc(33.33% - 10px); /* 33.33% para ocupar 1/3 do espaço, -10px para margens */
    margin-bottom: 10px;
}

.campo-titulo {
    flex: 1;
    font-weight: bold;
    margin-right: 10px;
    min-width: 100px;
}

.campo-valor {
    flex: 2;
    text-align: left;
}
.detalhesUsuario form button {
    display: inline-block;
    width: 130px;
    margin: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form {
    display: inline;
    margin: 0;
    padding: 0;
}

.btn-edit {
    background-color: rgb(0, 17, 255);
}

.btn-exc {
    background-color: rgb(255, 38, 0);
}

.btn-sair {
    background-color: rgb(10, 129, 104);
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/home.css">

    <title>Home</title>
</head>
<body>
    <div class="detalhesUsuario">
        <h1>Dados</h1>
        <div class="dados">
            <div class="campos-container">
                <!-- Exibição do nome -->
                <div class="campo">
                    <span class="campo-titulo">NOME:</span>
                    <span class="campo-valor">
                        <?php
                        $nomeUsuario = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Nome não encontrado';
                        echo $nomeUsuario;
                        ?>
                    </span>
                </div>
                <!-- Exibição do telefone -->
                <div class="campo">
                    <span class="campo-titulo">TELEFONE:</span>
                    <span class="campo-valor">
                        <?php
                        $telefoneUsuario = isset($_SESSION['user_phone']) ? $_SESSION['user_phone'] : 'Telefone não encontrado';
                        echo $telefoneUsuario;
                        ?>
                    </span>
                </div>
                <!-- Exibição do email -->
                <div class="campo">
                    <span class="campo-titulo">EMAIL:</span>
                    <span class="campo-valor">
                        <?php
                        $emailUsuario = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Email não encontrado';
                        echo $emailUsuario;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        
        <form action="">
            <button class="btn-edit">Editar</button>
        </form>
        <form action="">
            <button class="btn-exc">Excluir</button>
        </form>
        <form action="../controller/UserController.php">
            <button class="btn-sair" type="submit" id="sair" name="sair" value="sair">Sair</button>
        </form>
       

        
    </div>
</body>
</html>
