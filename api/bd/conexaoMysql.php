<?php
/******************************************************************************
        Objetivo: Arquivo responsavel para configurar a conexão com o Banco de 
        Dados MySQL
        Data:27/02/2022
        Autor: Vanderson
*******************************************************************************/
    
//Abre a conexão com base de dados MySQL
function conexaoMysql (){

     //Declaração de variaveis para conexão com BD
     $server = (string) BD_SERVER;
     $user = (string) BD_USER;
     $password = (string) BD_PASSWORD;
     $database = (string) BD_DATABASE;
     
    
     if($conexao = mysqli_connect($server, $user, $password, $database))
         return $conexao;
     else
     {
         echo("Não foi possivel fazer conexão com o  Banco de Dados");
         return false;
     }
}
?>