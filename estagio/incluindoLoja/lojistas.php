<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Usuário - Com CNPJ</h1>
    <form action="incluir.php" method="POST">
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome"><br>

        <label for="cpf">CNPJ</label>
        <input type="text" name="cnpj" id="cpf"><br>

        <label for="email">E-mail</label>
        <input type="text" name="email" id="emial"><br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha"><br>
        <input type= "submit">
    </form>
</body>
</html>