<?php
/******************************************************************************
        Objetivo: Inserir dados de Produtos de jogos no Banco de Dados
        Data:27/02/2021
        Autor: Vanderson
*******************************************************************************/

require_once(SRC.'bd/conexaoMysql.php');

function inserirProdutos($arrayProdutos)
{

    $sql = "insert into tbljogo
    (
        nome,
        descricao,
        foto,
        valor
    )
    values
    (
        '".$arrayProdutos['nome']."',
        '".$arrayProdutos['descricao']."',
        '".$arrayProdutos['foto']."',
        '".$arrayProdutos['valor']."'
    )";

    $conexao = conexaoMysql();
        
    if (mysqli_query($conexao, $sql))
        return true; 
    else
        return false;
}

?>