checked = false;

function toggle(x) {
  console.log(x);
  if (checked) {
    checked = false;
  } else {
    checked = true;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "hoeslijst.php?hoes=" + x);
  xhttp.onload() = function() {
    document.getElementById("hoescheck" + x).innerHTML = this.responseText;
  }
  xhttp.send();
  console.log(checked);
}
