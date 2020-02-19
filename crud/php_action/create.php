<?php

//sessão
session_start ();
//conexão
require_once 'db_connect.php';

if (isset ($_POST ['btn-cadastrar']) && is_numeric($_POST ['idade'])  ):
    $nome = mysqli_escape_string ($connect, $_POST ['nome']);
    $sobreNome = mysqli_escape_string ($connect, $_POST ['sobrenome']);
    $email = mysqli_escape_string ($connect, $_POST ['email']);
    $idade = mysqli_escape_string ($connect, $_POST ['idade']);

    $sql = "insert into clientes (nome, sobrenome, email, idade) values ('$nome', '$sobreNome', '$email', '$idade')";

    if(mysqli_query ($connect, $sql)):
        $_SESSION ['mensagem'] = "Cadastrado com sucesso";
        header ('location: ../index.php');
    else:
        $_SESSION ['mensagem'] = "Erro ao cadastrar";
        header ('location: ../index.php');
    endif;
else:
    $_SESSION ['mensagem'] = "Erro ao cadastrar";
    header ('location: ../index.php');
endif;

?>