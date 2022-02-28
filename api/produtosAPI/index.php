<?php

require_once('vendor/autoload.php');
require_once('./functions/config.php');

require_once(SRC.'controles/recebeDadosProdutos.php');
require_once(SRC.'controles/excluiDadosProdutos.php');


    $app = new \Slim\App();
    
    $app->get('/jogos', function ($request, $response, $args){
        require_once(SRC.'controles/exibiDadosProdutos.php');
        if($listDados = exibirProdutos())
            if($listDadosArray = criarArrayProduto($listDados))
                $listDadosArray = criarJSONProdutos($listDadosArray);
                
        if($listDadosArray)
        {
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type', 'application/json')
                                ->write($listDadosArray);
        }else{
            return $response    ->withStatus(204);
        }
    });

    $app->post('/jogos', function ($request, $response, $args){
        
        $contentType = $request -> getHeaderLine('Content-Type');
        
        if($contentType == 'application/json')
        {
            $dadosBodyJSON = $request -> getParsedBody();
            
            if($dadosBodyJSON == "" || $dadosBodyJSON == null)
            {
                return $response   ->withStatus(406)
                                   ->withHeader('Content-Type', 'application/json')
                                   ->write('{"message":"Conteúdo enviado pelo body, não contém dados validos"}'); 
            }else
            {
                if(inserirProdutosAPI($dadosBodyJSON))
                {
                    return $response   ->withStatus(201)
                                       ->withHeader('Content-Type', 'application/json')
                                       ->write('{"message":"Item criado com sucesso"}');
                }else
                {
                    return $response   ->withStatus(400)
                                       ->withHeader('Content-Type', 'application/json')
                                       ->write('{"message":"Não foi possível salvar os dados, por favor conferir o body da mensagem"}');
                }

            }
        }else
        {
            // -> para ascessar o methodo
           return $response    ->withStatus(406)
                               ->withHeader('Content-Type', 'application/json')
                               ->write('{"message":"Formato de dados do Header incompatível com JSON"}');
        }

    });

    $app->delete('/jogos/{id}', function ($request, $response, $args){
       
        //Recebe o Content Type do header, para verificar se o padrão do body será json
       $contentType = $request -> getHeaderLine('Content-Type');
       
           //Valida o id
           if(!isset($args['id']) || !is_numeric($args['id']) )
           {
               return $response   ->withStatus(406)
                                  ->withHeader('Content-Type', 'application/json')
                                  ->write('{"message":"Não foi encaminhado um id valido do registro"}'); 
           }else
           {
               
               //Recebe o id que sera enviado pela url
               $id = $args['id'];
       
               if(excluirProdutoAPI($id))
               {
                   return $response   ->withStatus(200)
                                      ->withHeader('Content-Type', 'application/json')
                                      ->write('{"message":"Item excluido com sucesso"}');
               }else
               {
                   return $response   ->withStatus(400)
                                      ->withHeader('Content-Type', 'application/json')
                                      ->write('{"message":"Não foi possível excluir os dados"}');
               }
               
              
           }

    });


    $app -> run();

?>