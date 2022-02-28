<?php
/******************************************************************************
        Objetivo: Arquivo responsavel pela busca ou lista os dados do produto, 
        solicitando ao BD
        Data: 27/02/2022
        Autor: Vanderson
*******************************************************************************/
 
require_once (SRC.'bd/listarProdutos.php');

// Recebe os dados de produtos
function exibirProdutos () 
{
        $dados = listarProdutos();
        return $dados;
}

// cria um array de produtos
function criarArrayProduto ($objeto)
{
    $cont = (int) 0;

    while($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array (
            "id"        =>      $rsDados['idjogo'],
            "nome"      =>      $rsDados['nome'],
            "descricao" =>      $rsDados['descricao'],
            "foto"      =>      $rsDados['foto'],
            "valor"     =>      $rsDados['valor']
        );

        $cont ++;
    }

    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

function criarJSONProdutos ($arrayDados)
{
    header("content-type:application/json/");

    $listProdutosJSON = json_encode($arrayDados);

    if(isset($listProdutosJSON))
        return $listProdutosJSON;
    else
        return false;
}

?>