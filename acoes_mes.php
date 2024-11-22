<?php
session_start();
require_once('conexao.php');

if (isset($_POST['mes_create'])) {
    $nome_mes = mysqli_real_escape_string($conn, $_POST['nome_mes']);
    $ano = mysqli_real_escape_string($conn, $_POST['ano']);

    $sql = "INSERT INTO meses (nome_mes, ano) 
            VALUES ('$nome_mes', '$ano')";

    if (mysqli_query($conn, $sql)) {
        header('Location: lista.php');
        exit();
    } else {
        echo "Erro ao inserir a categoria: " . mysqli_error($conn);
    }
}
?>