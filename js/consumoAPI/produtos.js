'use strict';
const url = 'http://localhost/SmartGames/api/';

//carregando produtos
const getProdutos = async() =>{
    const response = await fetch(`${url}jogos`);
    const produtos = await response.json();
    return produtos;
};

export{
    getProdutos
};