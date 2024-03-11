var spullenInWagen = document.getElementById("inwagen");
var counter = 0;

spullenInWagen.innerHTML = counter;

function cartCounter(productcode) {
  counter++;
  spullenInWagen.innerHTML = counter;
  console.log(productcode);
}
