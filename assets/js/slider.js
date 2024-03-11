//variabelen voor de sliders
var sliderTop = document.getElementById("minprice");
var sliderBottom = document.getElementById("maxprice");

//variabelen voor de output
var topOutput = document.getElementById("minvalue");
var bottomOutput = document.getElementById("maxvalue");

//zet de value van de slider over in output.
topOutput.innerHTML = sliderTop.value;
bottomOutput.innerHTML = sliderBottom.value;

sliderTop.oninput = function () {
  topOutput.innerHTML = this.value;
};

sliderBottom.oninput = function () {
  bottomOutput.innerHTML = this.value;
};
