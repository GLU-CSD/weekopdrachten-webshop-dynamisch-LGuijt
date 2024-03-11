isClicked = false;
function burgerOne() {
  if (!isClicked){
    document.getElementById("burgernav").style.left = "5%";
    isClicked = !isClicked;
  } else {
    document.getElementById("burgernav").style.left = "100vw";
    isClicked = !isClicked;
  }
}
