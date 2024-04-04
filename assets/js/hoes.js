function toggle(x, check) {
  const xmlhttp = new XMLHttpRequest();

  if (check == true) {
    xmlhttp.open("GET", "hoeslijst.php?check=true&hoes=" + x);
    xmlhttp.onload = function (){
      document.getElementById("hoesprijs" + this.response).style.opacity = "0.5";
      let y = document.getElementById("totalitemprice" + this.response).innerHTML;
      y = parseFloat(y);
      y = y - 5;
      y = y.toFixed(2);
      document.getElementById("totalitemprice" + this.response).innerHTML = y;

      let z = document.getElementById("combiprijs").innerHTML;
      z = parseFloat(z);
      z = z - 5;
      z = z.toFixed(2);
      document.getElementById("combiprijs").innerHTML = z;

      let aa = document.getElementById("btw").innerHTML;
      aa = parseFloat(aa);
      aa = z * 0.21;
      aa = aa.toFixed(2);
      document.getElementById("btw").innerHTML = aa;

      let b = document.getElementById("ugh").innerHTML;
      b = parseFloat(b);
      let c = document.getElementById("totalmoney").innerHTML;
      c = +c;
      c = +z + +aa + +b;
      c = parseFloat(c);
      c = c.toFixed(2);
      document.getElementById("totalmoney").innerHTML = c;

      document.getElementById("checkbox" + this.response).setAttribute('onclick', 'toggle("' + this.response + '", false)');
    }
    xmlhttp.send();

  } else if (check == false) {

    xmlhttp.open("GET", "hoeslijst.php?check=false&hoes=" + x);
    xmlhttp.onload = function () {

      console.log("hoescheck" + this.responseText);
      document.getElementById("hoesprijs" + this.response).style.opacity = "1";
      let y = document.getElementById("totalitemprice" + this.response).innerHTML;
      y = parseFloat(y);
      y = y + 5;
      y = y.toFixed(2);
      document.getElementById("totalitemprice" + this.response).innerHTML = y;

      let z = document.getElementById("combiprijs").innerHTML;
      z = parseFloat(z);
      z = z + 5;
      z = z.toFixed(2);
      document.getElementById("combiprijs").innerHTML = z;

      let aa = document.getElementById("btw").innerHTML;
      aa = parseFloat(aa);
      aa = z * 0.21;
      aa = aa.toFixed(2);
      document.getElementById("btw").innerHTML = aa;

      let b = document.getElementById("ugh").innerHTML;
      b = parseFloat(b);

      let c = document.getElementById("totalmoney").innerHTML;
      c = parseFloat(c);
      c = +c;
      c = +z + +aa + +b;
      c = parseFloat(c);
      c = c.toFixed(2);
      document.getElementById("totalmoney").innerHTML = c;

      document.getElementById("checkbox" + this.response).setAttribute('onclick', 'toggle("' + this.response + '", true)');
    };
    xmlhttp.send();

  }
}
