<?php
/******************************************************************************************************************
    Objetivo: Arquivo resposável por receber dados da API (POST)
    Data:27/02/22
    Autor:Vanderson 
******************************************************************************************************************/

//Import do arquivo de configuração
require_once ('./functions/config.php');
//Import do arquivo que vai inserir no banco de dados
require_once (SRC.'bd/inserirProdutos.php');

function inserirProdutosAPI($array)
{
    if(inserirProdutos($array))
        return true;
    else
        return false;
}
?>