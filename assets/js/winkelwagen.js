var spullenInWagen = document.getElementById("inwagen");
var counter = 0;

spullenInWagen.innerHTML = counter;

function cartCounter(productcode) {
  counter++;
  spullenInWagen.innerHTML = counter;
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "winkellijst.php?code=" + productcode);
  xmlhttp.send();
  console.log(productcode);
}
