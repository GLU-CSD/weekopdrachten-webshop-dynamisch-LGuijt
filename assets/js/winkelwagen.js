function cartCounter(productcode) {
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "winkellijst.php?status=add&code=" + productcode);
  xmlhttp.send();
}

function trashcan(productcode){
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "winkellijst.php?status=remove&code=" + productcode);
  xmlhttp.onload = function() {
    location.reload();
  }
  xmlhttp.send();
}
