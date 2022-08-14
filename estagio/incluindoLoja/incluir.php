<?php
    session_start();
    include("conne.php");

    if(empty($_POST['cnpj']) || empty($_POST['email'])){
        header("Location: usuarios.php");
    }

    //Capturando valores via forms e sessão
    $nome = mysqli_real_escape_string($conne, $_POST['nome']);
    $cnpj = mysqli_real_escape_string($conne, $_POST['cnpj']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $senha = mysqli_real_escape_string($conne, $_POST['senha']);

    //fazendo consulta
    $sql = "SELECT cnpj FROM lojista WHERE cnpj = '{$cnpj}' ";

    $executar = mysqli_query($conne, $sql);

    $resultado = mysqli_num_rows($executar);


    //caso exista redireciona o usuário
    if($resultado){
        $_SESSION['existe'] = $cnpj;
        header("Location: usuarios.php");
    }

    //inserido lojista ou usuário comum
    else{
        $comando = "INSERT INTO lojista (nome, cnpj,email,senha) VALUES ('{$nome}', '{$cnpj}','{$email}','{$senha}')";
        $update = "ALTER TABLE lojista ADD COLUMN valor int;";
        $exe = mysqli_query($conne, $comando);
        $exe = mysqli_query($conne, $update);
        $_SESSION['criado'] = $nome;
        header("Location: lojistas.php");
    }


?>