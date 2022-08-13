<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferência</title>
</head>
<body>
    <h1>Transferir</h1>
    <form action="verificar.php" method="POST">
        <label for="destino">CPF ou CNPJ destinado</label>
        <input type="text" name = "destino" id = "destino">

        <label for="valor">Valor</label>
        <input type="text" name = "valor" id = "valor">

        <label for="cpf">Seu CPF</label>
        <input type="text" name = "cpf" id = "cpf">

        <input type="submit">
    </form>
</body>
</html>