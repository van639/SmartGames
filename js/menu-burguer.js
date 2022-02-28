let eventClick = false;

function fun(){
  var menuBurguer = document.getElementById('menuBurguer');
  var btn1 = document.getElementById('block1');
  var btn2 = document.getElementById('block2');
  var btn3 = document.getElementById('block3');
  var itens = document.getElementById('menuAnimation');

  if (eventClick) {
    eventClick=!eventClick;


    btn1.style.transform = "rotate(0deg)";
    btn2.style.transform = "rotate(0deg)";
    btn3.style.transform = "rotate(0deg)";
    btn3.style.marginLeft = "20px";

    itens.style.width = "0px";
    itens.style.height = "0px";
    itens.style.marginLeft = "-1000px"
    itens.style.animation = "menuAnimationI 2s"

    itens.style.opacity = "0";
    itens.style.visibility = "none";

  }
  else{
    eventClick=!eventClick;


    btn1.style.transform = "rotate(40deg)";
    btn2.style.transform = "rotate(-40deg)";
    btn3.style.transform = "rotate(40deg)";
    btn3.style.marginLeft = "25px";

    itens.style.marginLeft = "70px"
    itens.style.opacity = "1"
    itens.style.transition = "0.7s"
    itens.style.position = "absolute"

  }
}