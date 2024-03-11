let vnaamcheck = false;
let anaamcheck = false;
let postcodecheck = false;
let straatcheck = false;
let numcheck = false;
let mailcheck = false;
let telcheck = false;

function checkField(element) {
  if (element.value == "" || element.value == " ") {
    element.style.backgroundColor = "#FFB1B1";
    element.style.borderColor = "#FF0000";

    if (
      element.placeholder == "Voornaam" ||
      element.placeholder == "Achternaam"
    ) {
      x = document.getElementById("nameerror");
      x.innerHTML = "*Dit veld moet nog ingevuld worden.";
      if (element.placeholder == "Voornaam") {
        vnaamcheck = false;
        checkInput();
      } else {
        anaamcheck = false;
        checkInput();
      }
    }

    if (element.placeholder == "1234AB") {
      x = document.getElementById("codeerror");
      x.innerHTML = "*Dit veld moet nog ingevuld worden.";
      postcodecheck = false;
      checkInput();
    }

    if (element.placeholder == "Straat" || element.placeholder == "Nummer") {
      x = document.getElementById("strterror");
      x.innerHTML = "*Dit veld moet nog ingevuld worden.";
      if (element.placeholder == "Straat") {
        straatcheck = false;
        checkInput();
      } else {
        numcheck = false;
        checkInput();
      }
    }
    if (element.placeholder == "E-mailadres") {
      x = document.getElementById("mailerror");
      x.innerHTML = "*Dit veld moet nog ingevuld worden.";
      mailcheck = false;
      checkInput();
    }
    if (element.placeholder == "0612345678") {
      x = document.getElementById("telerror");
      x.innerHTML = "*Dit veld moet nog ingevuld worden.";
      telcheck = false;
      checkInput();
    }
  }

  if (element.value !== "" && element.value !== " ") {
    element.style.backgroundColor = "white";
    element.style.borderColor = "grey";

    if (
      element.placeholder == "Voornaam" ||
      element.placeholder == "Achternaam"
    ) {
      x = document.getElementById("nameerror");
      x.innerHTML = "*";
      if (element.placeholder == "Voornaam") {
        vnaamcheck = true;
        checkInput();
      } else {
        anaamcheck = true;
        checkInput();
      }
    }
    if (element.placeholder == "1234AB") {
      x = document.getElementById("codeerror");
      x.innerHTML = "*";
      postcodecheck = true;
      checkInput();
    }
    if (element.placeholder == "Straat" || element.placeholder == "Nummer") {
      x = document.getElementById("strterror");
      x.innerHTML = "*";
      if (element.placeholder == "Straat") {
        straatcheck = true;
        checkInput();
      } else {
        numcheck = true;
        checkInput();
      }
    }
    if (element.placeholder == "E-mailadres") {
      x = document.getElementById("mailerror");
      x.innerHTML = "*";
      mailcheck = true;
      checkInput();
    }
    if (element.placeholder == "0612345678") {
      x = document.getElementById("telerror");
      x.innerHTML = "*";
      telcheck = true;
      checkInput();
    }
  }
}

function checkInput() {
  y = document.getElementById("submitbutton");

  if (vnaamcheck && anaamcheck && postcodecheck && straatcheck && numcheck && mailcheck && telcheck
  ) {
    y.setAttribute("type", "submit");
    y.removeAttribute("onclick");
  } else {
    y.setAttribute("type", "button");
    y.setAttribute("onclick", "notValidated()");
  }
}

function notValidated() {
  y = document.getElementById("notvalid");
  y.innerHTML = "Sommige velden zijn niet correct ingevuld.";
}
