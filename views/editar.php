<?php
session_start();
?>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}
h1 {
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.container {
    width: 400px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container h1 {
    text-align: center;
    color: #333;
}

input[type="text"],
input[type="password"] {
    width: 380px;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: rgb(115, 179, 176);
    box-shadow: 0 0 5px rgb(134, 187, 189);
}


form {
    text-align: center;
}

form > button {
    background: rgb(9,201,164);
    background: linear-gradient(90deg, rgba(9,201,164,1) 0%, rgba(9,201,166,1) 43%, rgba(25,186,242,1) 100%);
    width: 150px;
    height: 40px;
    border: 0px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 17px;
    font-family:'Times New Roman', Times, serif;
}

span {
    cursor: pointer;
    font-size: 15px;
}
span:hover {
    font-size: 15.5px;
}
span > a {
    text-decoration: none;
    color: rgb(8, 50, 128);
}

@media (max-width: 390px) {
   .container {
    width: 300px;
   }

   input[type="text"],
   input[type="password"] {
    width: 200px;
   
}
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form action="../controller/UserController.php" method="post" class="formConect">
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="text" id="nome" name="nome" value="<?php echo $_SESSION['user_name']; ?>" placeholder="Novo Nome" required>
            <input type="text" id="telefone" name="telefone" value="<?php echo $_SESSION['user_phone']; ?>" placeholder="Novo Telefone" required>
            <input type="text" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" placeholder="Novo Email" required>
            <input type="password" id="senha" name="senha" value="<?php echo $_SESSION['user_email']; ?>" placeholder="Nova Senha" required>
            <button type="submit" id="editar" name="editar" value="editar">Salvar</button>
        </form>
    </div>
</body>
</html>
