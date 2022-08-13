<?php
    session_start();
    include("conne.php");

    if(empty($_POST['cnpj']) || empty($_POST['email'])){
        header("Location: usuarios.php");
    }
    $nome = mysqli_real_escape_string($conne, $_POST['nome']);
    $cnpj = mysqli_real_escape_string($conne, $_POST['cnpj']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $senha = mysqli_real_escape_string($conne, $_POST['senha']);

    $sql = "SELECT cnpj FROM lojista WHERE cnpj = '{$cnpj}' ";

    $executar = mysqli_query($conne, $sql);

    $resultado = mysqli_num_rows($executar);

    if($resultado){
        $_SESSION['existe'] = $cnpj;
        header("Location: usuarios.php");
    }
    else{
        $comando = "INSERT INTO lojista (nome, cnpj,email,senha) VALUES ('{$nome}', '{$cnpj}','{$email}','{$senha}')";
        $update = "ALTER TABLE lojista ADD COLUMN valor int;";
        $exe = mysqli_query($conne, $comando);
        $exe = mysqli_query($conne, $update);
        $_SESSION['criado'] = $nome;
        header("Location: transferir.php");
    }


?>