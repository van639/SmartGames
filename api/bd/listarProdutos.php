<?php
/******************************************************************************
        Objetivo: Arquivo responsavel por listar todos os dados de produtos no
         Banco de dados
        Data: 27/02/2022
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once(SRC.'bd/conexaoMysql.php');

// Faz o select no banco de dados
function listarProdutos (){
    $sql = "select * from tbljogo order by idjogo desc";

    $conexao = conexaoMysql();
    $select = mysqli_query($conexao, $sql);

    return $select;
}

//Retorna apenas um registro, com base no id
function buscarProduto ($id)
{
    $sql = "select tbljogo.*, tblloja.endereco, tblplataforma.nome as plataforma
	from tbljogo_loja
    inner join tbljogo on tbljogo.idjogo = tbljogo_loja.idjogo
	inner join tblloja on tblloja.idloja = tbljogo_loja.idloja
    inner join tbljogo_plataforma on tbljogo.idjogo = tbljogo_plataforma.idjogo
	inner join tblplataforma on tblplataforma.idplataforma = tbljogo_plataforma.idplataforma
    where tbljogo.idjogo = " . $id;
    
    //Abre a conexao com o BD
    $conexao = conexaoMysql();
    
    //Solicita ao banco de dados a execução do script SQL 
    //Precisar colocar em uma variavel poerque o banco vai retornar os dados - $select
    $select = mysqli_query($conexao, $sql);
    
    return $select;  
}

?>

