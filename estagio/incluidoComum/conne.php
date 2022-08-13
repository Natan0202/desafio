<?php
    /*Conexão com o banco*/
    
    define('HOST' , '127.0.0.1');
    define('USER' , 'root');
    define('SENHA' , '');
    define('DB' , 'sistema');
    
    //TEM ORDEM  - HOST, USER, SENHA, DB
    $conne = mysqli_connect(HOST, USER, SENHA, DB) or die ("Falha na conexão");
    
    
?>