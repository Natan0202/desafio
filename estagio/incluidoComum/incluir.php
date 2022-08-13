<?php
    /*Iniciando uma sessão que fique aberta para outras abas*/
    session_start();

    include("conne.php");

    //verificação se campos estão vazios
    if(empty($_POST['cpf']) || empty($_POST['email'])){
        header("Location: usuarios.php");
    }

    //Capturando dados no formulário localizado em usuarios.php
    $nome = mysqli_real_escape_string($conne, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conne, $_POST['cpf']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $senha = mysqli_real_escape_string($conne, $_POST['senha']);


    /*Aqui estou rodando uma verificação para ver se o cpf no qual irá ser cadastrado
    já existe, caso sim, ele retorna novamente para página*/
    $sql = "SELECT cpf FROM comum WHERE cpf = '{$cpf}' ";

    $executar = mysqli_query($conne, $sql);

    $resultado = mysqli_num_rows($executar);

    //Retornando
    if($resultado){
        $_SESSION['existe'] = $cpf;
        header("Location: usuarios.php");
    }

    //Caso não exista um CPF semelhante, é cadastrado
    else{
        $comando = "INSERT INTO comum (nome, cpf,email,senha) VALUES ('{$nome}', '{$cpf}','{$email}','{$senha}')";
        $exe = mysqli_query($conne, $comando);

        //Na hora do cadastrado se cria uma coluna valor para todos os campos
        //Iremos usar mais tarde para ser usado como meio de receber e transferir valores
        $update = "ALTER TABLE comum ADD COLUMN valor int;";
        $exe = mysqli_query($conne, $update);

        $_SESSION['criado'] = $nome;
        header("Location: transferir.php");
    }


?>