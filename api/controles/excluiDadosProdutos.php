<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por receber o id do cliente e encaminhar para
        a função que ira excluir o dado 
        Data: 29/09/2021
        Autor: Vanderson
*******************************************************************************/
require_once (SRC.'bd/excluirProdutos.php');

function excluirProdutoAPI ($id){

    if(excluir($id))
        return true;
    else
        return false;

}
    
?>