function recupererEmail() {
  var variableMail = "";
  var req = new XMLHttpRequest();
  req.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      variableMail = this.responseText;
      var xhr = new XMLHttpRequest();
    // xhr.withCredentials = true;
      xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
          var donnee = this.response;
          var livrableMail = donnee.data['deliverable'];
          var jetableMail = donnee.data['disposable'];
          console.log(donnee.data['email_address']);
            if(livrableMail == true && jetableMail == false){
                window.location.href = 'validationEmail.php';
            }
            else{
                var loader = document.getElementById('loader');
                var msg = document.getElementById('msg');
                let variable = 'Email non valide';
                loader.classList.add('cacher');
                loader.classList.remove('loader');
                msg.classList.remove('cacher');
                msg.classList.add('text-danger');
                msg.innerHTML = variable;
            }
        }
        else{
          var loader = document.getElementById('loader');
          loader.classList.remove('cacher');
          loader.classList.add('loader');
          loader.classList.add('loader');
        }
      });
      xhr.open("GET", "https://api.eva.pingutil.com/email?email="+variableMail);
      xhr.responseType = 'json';
      xhr.send();
    }
  });
  req.open("GET", "validMail.php");
  req.responseType = "text";
  req.send();
  console.log(variableMail);
  return variableMail;
}

function showForm(btn){
    
  if(btn.id == "btn-nom"){
      var nom = document.getElementById("nomForm");
      btn.style.display = "none";
      nom.classList.remove("hide");
  }
  else if (btn.id == "btn-mail") {
      var mail = document.getElementById("mailForm");
      btn.style.display = "none";
      mail.classList.remove("hide");
  }
  else if (btn.id == "btn-num") {
      var numero = document.getElementById("numForm");
      btn.style.display = "none";
      numero.classList.remove("hide");
  } else {
      // do nothing
  }
}

function checkName(){
  var userName = document.getElementById("nomFormulaire");
  var regexforName = /[,|;|=|:|!|$|&|"|'|?]/g;

  if(userName.value.match(regexforName)){
      document.getElementById("msg").innerHTML = "Caractère invalide pour un nom !";
      document.getElementById("msg").classList.remove("cacher");
      document.getElementById("msg").classList.add("text-danger");
      document.getElementById("msg").classList.add("text-sm");
      document.getElementById("key_button").setAttribute("disabled", "");
  }
  else{
      document.getElementById("msg").innerHTML = "";
      document.getElementById("key_button").removeAttribute("disabled", "");
  }
}

function checkNumber(){
var userNumber = document.getElementById("numFormulaire");
var regexNonAutorized = /[,|;|=|:|.|!|$|&|"|'|?]/g;
if(userNumber.value.match(regexNonAutorized)){
    document.getElementById("msg").innerHTML = "Un numero ne doit pas contenir ses caractères !";
    document.getElementById("msg").classList.add("text-danger");
    document.getElementById("msg").classList.add("text-sm");
    document.getElementById("key_button").setAttribute("disabled", "");
}
else{
    document.getElementById("msg").innerHTML = "";
    document.getElementById("key_button").removeAttribute("disabled", "");
}
}

function changePassword() {
  var pass = document.getElementById("passField").value;
  var oldpass = document.getElementById("oldpass").value;
  var error = document.getElementById("msgPass");
  if((pass == "") || (oldpass == "")){
    error.classList.add("text-danger");
    error.classList.add("text-sm");
    error.innerHTML = "Le champ de votre mot de passe est vide ! ";
  }
  else if (pass.length < 8) {
    error.classList.add("text-danger");
    error.classList.add("text-sm");
    error.innerHTML = "Le mot de passe doit au moins contenir 8 caractères ❗ ";
  }
  else{
    var requete = new XMLHttpRequest();
    requete.open("POST", "somewherePass/pass.php",true);
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requete.addEventListener("readystatechange", function () {
      if(this.readyState === 4){
        if(this.responseText == "Match_and_modified"){
          error.classList.remove("text-danger");
          error.classList.add("text-success");
          error.classList.add("text-sm");
          error.innerHTML = "Mot de passe modifiée avec success ✔ ! ";
        }
        else{
          error.classList.add("text-danger");
          error.classList.add("text-sm");
          error.innerHTML = "L'ancien mot de passe est incorrect ❌ ! ";
        }
      }
        
      }); 
      requete.send("pass="+pass+"&oldpass="+oldpass);
  }
  
}