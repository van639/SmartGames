'use strict';
import {getProdutos} from './produtos.js';

const criarCard = ({nome,descricao,foto,valor}) =>{
    
    const card = document.createElement('div');
    card.classList.add('cardJogo');
    card.innerHTML = `
        <img src="${foto}" alt="">
        <div class="hr-card"></div>
        <h3 class="tipografiaDeLetra" >${nome}</h3>
                    
        <p class="tipografiaDeLetra">
                ${descricao}
        <p>
        <div class="precoSaibaMais">
            <div class="btnSaibaMais">SAIBA MAIS</div>
            <div class="preco">R$ ${valor}</div>
        </div>
    `;
    return card;

};


const carregarProdutos = async () =>{
    const container = document.getElementById('containerJogos');
    const produtos = await getProdutos();
    const cards = produtos.map(criarCard);
    container.replaceChildren(...cards);
}
carregarProdutos();