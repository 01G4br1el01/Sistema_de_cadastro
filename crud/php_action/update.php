<?php

//sessão
session_start ();
//conexão
require_once 'db_connect.php';

if (isset ($_POST ['btn-editar']) && is_numeric($_POST ['idade'])  ):
    $nome = mysqli_escape_string ($connect, $_POST ['nome']);
    $sobreNome = mysqli_escape_string ($connect, $_POST ['sobrenome']);
    $email = mysqli_escape_string ($connect, $_POST ['email']);
    $idade = mysqli_escape_string ($connect, $_POST ['idade']);
    $id = mysqli_escape_string ($connect, $_POST ['id']);

    $sql = "update clientes set nome = '$nome', sobrenome = '$sobreNome', email = '$email', idade = '$idade' where id = '$id'";

    if(mysqli_query ($connect, $sql)):
        $_SESSION ['mensagem'] = "Atualizado com sucesso";
        header ('location: ../index.php');
    else:
        $_SESSION ['mensagem'] = "Erro ao atualizar";
        header ('location: ../index.php');
    endif;
else:
    $_SESSION ['mensagem'] = "Erro ao atualizar";
    header ('location: ../index.php');
endif;

?>