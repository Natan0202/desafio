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

    /*Verificação se o CPF é o mesmo de remetente*/
    //Anexo 02
    $ver = "SELECT cpf FROM comum WHERE cpf = '{$destino}'";
    $verificar = mysqli_query($conne, $ver);
    $verificado = mysqli_num_rows($verificar);

    /*Pegando valor da tabela do usuário cujo o CPF é fornecido*/
    $consulta = "SELECT valor FROM comum WHERE cpf = '{$cpf}'";

    $exec = $conne->query($consulta);
    
    //Anexo 03
    /*Capturando o valor de um campo no SQL para colocar em uma variável*/
    while($row = $exec->fetch_assoc()){
        $var = $row['valor'];
    }
    $cal = $var - $valor;

    /*Pegando valor da tabela do usuário cujo o CNPJ é fornecido*/

    //Anexo 04
    $consulta2 = "SELECT valor FROM lojista WHERE cnpj = '{$destino}'";

    $executar = $conne->query($consulta2);
    $var2 = 0;
    while($row = $executar->fetch_assoc()){
        $var2 = $row['valor'];
    }
    $soma = $var2 + $valor;

    /**/

    /*Verificando se o CPF/CNPJ é válido e se o valor de saldo é maior que 0*/
    if($resultado){
        echo "<br>Transferência não disponível por questão de Saldo! Ou CPF/CNPJ inválido";
    }

    /*No 1º While é capturado o valor do campo no SQL (valor) e aqui faço um calculo para saber
    se o valor que vai se transferido é maior do que o saldo*/
    elseif($cal < 0){
        echo "Valor a ser tranferido é menor do que seu saldo!";
    }

    /*Aqui verifica se o CPF que vai ser o destino é o mesmo do remetente*/
    elseif($verificado){
        echo "CPF não pode ser do destinatário! ";
    }/*Aqui está executando a transferência*/
    else{
        $command = "UPDATE lojista SET valor = $soma WHERE cnpj = '{$destino}'";
        $executando = mysqli_query($conne, $command);

        $command2= "UPDATE comum SET valor = $cal WHERE cpf = '{$cpf}'";
        $exe2 = mysqli_query($conne, $command2);

        header("Location: http://o4d9z.mocklab.io/notify");

    }


?>