<?php
/******************************************************************************
        Objetivo: Arquivo para excluir dados de jogos no Banco de Dados MySQL
        Data:28/02/2022
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once(SRC.'bd/conexaoMysql.php');

function excluir($id)
{
    $sql = "delete from tbljogo
                where idjogo = ".$id;
    
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}

?>