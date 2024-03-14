isClicked = false;
function burgerOne() {
  if (!isClicked){
    document.getElementById("burgernav").style.left = "0";
    isClicked = !isClicked;
  } else {
    document.getElementById("burgernav").style.left = "100vw";
    isClicked = !isClicked;
  }
}
