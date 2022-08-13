<?php
    session_start();
    include("conne.php");
    if(empty($_POST['destino']) || empty($_POST['valor'])){
        header("Location: transferir.php");
    }

    $valor = mysqli_real_escape_string($conne, $_POST['valor']);
    $destino = mysqli_real_escape_string($conne, $_POST['destino']);
    $cpf = mysqli_real_escape_string($conne, $_POST['cpf']);

    //Anexo 01
    //Verificando a busca pelo cpf e verificando se valor é superior a zero para prosseguir 
    //com a transferência
    $sql = "SELECT cpf, valor FROM comum WHERE cpf = '{$cpf}' and valor <= 0";
    $exe = mysqli_query($conne, $sql);
    $resultado = mysqli_num_rows($exe);


    $ver = "SELECT cpf FROM comum WHERE cpf = '{$destino}'";
    $verificar = mysqli_query($conne, $ver);
    $verificado = mysqli_num_rows($verificar);

    /*Pegando valor da tabela do usuário cujo o CPF é fornecido*/
    $consulta = "SELECT valor FROM comum WHERE cpf = '{$cpf}'";

    $exec = $conne->query($consulta);
    
    while($row = $exec->fetch_assoc()){
        $var = $row['valor'];
    }
    $cal = $var - $valor;

    /*Pegando valor da tabela do usuário cujo o CNPJ é fornecido*/

    $consulta = "SELECT valor FROM lojista WHERE cnpj = '{$destino}'";

    $executar = $conne->query($consulta);
    $var2 = 0;
    while($row = $executar->fetch_assoc()){
        $var2 = $row['valor'];
    }
    $soma = $var2 + $valor;

    /**/

    if($resultado){
        echo "<br>Transferência não disponível por questão de Saldo! Ou CPF/CNPJ inválido";
    }
    elseif($cal < 0){
        echo "Valor a ser tranferido é menor do que seu saldo!";
    }
    elseif($verificado){
        echo "CPF não pode ser do destinatário! ";
    }
    else{
        $command = "UPDATE lojista SET valor = $soma WHERE cnpj = '{$destino}'";
        $executando = mysqli_query($conne, $command);

        $command2= "UPDATE comum SET valor = $cal WHERE cpf = '{$cpf}'";
        $exe2 = mysqli_query($conne, $command2);

        header("Location: http://o4d9z.mocklab.io/notify");

    }


?>