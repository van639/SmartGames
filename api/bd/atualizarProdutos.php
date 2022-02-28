<?php
/******************************************************************************
        Objetivo: Atualizar dados de um Produto existente no Banco de Dados
        Data:28/02/2022
        Autor: Vanderson
*******************************************************************************/

//Import do arquivo de conexão com o bd
require_once('../bd/conexaoMysql.php');

function editarProduto ($arrayProduto) 
{
    $sql = "update tbljogo set
        nome = '".$arrayProduto['nome']."',
        descricao = '".$arrayProduto['descricao']."',
        foto = '".$arrayProduto['foto']."',
        valor = '".$arrayProduto['valor']."'
                        
    where idjogo = ".$arrayProduto['id'];
                
        //Chamando a função que estabelece a conexão com o BD
        $conexao = conexaoMysql();
        
        //Envia o script SQL para o BD  --> mysqli_query($conexao, $sql);
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no banco de dados
        else
            return false; //Retorna falso se houver algum problema
    }

?>