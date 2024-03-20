checked = false;

function toggle(x) {
  console.log(x);
  if (checked) {
    checked = false;
  } else {
    checked = true;
  }
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "hoeslijst.php?hoes=" + x);
  xmlhttp.onload = function(){
    console.log("hoescheck" + this.responseText);
  }
  xmlhttp.send();
  console.log(checked);
}
