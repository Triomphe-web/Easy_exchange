const checkBoxValue = document.getElementById("check");
var userinput = document.getElementById("inputMail");
const formValue = document.getElementById("pass");
var userName = document.getElementById("nom_for_add_user");
var userNumber = document.getElementById("numero");

function changeValue(){
    if(formValue.type === "password"){
        formValue.type = "text";
    } else {
        formValue.type = "password";
      }
}

function checkName(){
    var regexforName = /[,|;|=|:|!|$|&|"|'|?]/g;

    if(userName.value.match(regexforName)){
        document.getElementById("error").innerHTML = "Caractère invalide pour un nom !";
        document.getElementById("error").classList.add("text-danger");
        document.getElementById("error").classList.add("text-sm");
        document.getElementById("key_button").setAttribute("disabled", "");
    }
    else{
        document.getElementById("error").innerHTML = "";
        document.getElementById("key_button").removeAttribute("disabled", "");
    }
}

function checkNumber(){
  var regexNonAutorized = /[,|;|=|:|.|!|$|&|"|'|?]/g;
  if(userNumber.value.match(regexNonAutorized)){
      document.getElementById("errNum").innerHTML = "Un numero ne doit pas contenir ses caractères !";
      document.getElementById("errNum").classList.add("text-danger");
      document.getElementById("errNum").classList.add("text-sm");
      document.getElementById("key_button").setAttribute("disabled", "");
  }
  else{
      document.getElementById("errNum").innerHTML = "";
      document.getElementById("key_button").removeAttribute("disabled", "");
  }
}

function checkEmail(){
    var regexNonAutorized = /[,|;|=|:|!|$|&|"|'|?]/g;


    if(userinput.value.match(regexNonAutorized)){
        document.getElementById("err").innerHTML = "L'adresse mail ne doit pas contenir ses caractères !";
        document.getElementById("err").classList.add("text-danger");
        document.getElementById("err").classList.add("text-sm");
        document.getElementById("key_button").setAttribute("disabled", "");
    }
    else{
        document.getElementById("err").innerHTML = "";
        document.getElementById("key_button").removeAttribute("disabled", "");
    }
}

function checkingPassword() {
    var userPassword = document.getElementById("pass");
  
    var capitalLetter = document.getElementById("capitalLetter");
    var lowerLetter = document.getElementById("lowerCapital");
    var number = document.getElementById("number");
    var size = document.getElementById("size");
  
    var capitalLetters = /[A-Z]/g;
    var lowerLetters = /[a-z]/g;
    var numbers = /[0-9]/g;
  
    // Vérification de la présence d'une lettre majuscule
  
    if (userPassword.value.match(capitalLetters)) {
      capitalLetter.classList.remove("invalid");
      capitalLetter.classList.add("valid");
      document.getElementById("key_button").removeAttribute("disabled", "");
    } else {
      capitalLetter.classList.remove("valid");
      capitalLetter.classList.add("invalid");
      document.getElementById("key_button").setAttribute("disabled", "");
    }
  
    // Vérification de la présence d'une lettre miniscule
  
    if (userPassword.value.match(lowerLetters)) {
      lowerLetter.classList.remove("invalid");
      lowerLetter.classList.add("valid");
      document.getElementById("key_button").removeAttribute("disabled", "");
    } else {
      lowerLetter.classList.remove("valid");
      lowerLetter.classList.add("invalid");
      document.getElementById("key_button").setAttribute("disabled", "");
    }
  
    // Vérification de la présence d'un chiffre
  
    if (userPassword.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
      document.getElementById("key_button").removeAttribute("disabled", "");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
      document.getElementById("key_button").setAttribute("disabled", "");
    }
  
    // Vérification d'une longueur minimale de 8 caractères
    if (userPassword.value.length >= 8) {
      size.classList.remove("invalid");
      size.classList.add("valid");
      document.getElementById("key_button").removeAttribute("disabled", "");
    } else {
      size.classList.remove("valid");
      size.classList.add("invalid");
      document.getElementById("key_button").setAttribute("disabled", "");
    }
  }