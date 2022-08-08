<?php
//initialisation de session
session_start();
if(isset($_SESSION['nom']) && !empty($_SESSION['nom'])){
    header("Location:index.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addUser.css">
    <title>Creer compte Easy</title>
</head>

<body>
    <?php if(!empty($_GET['salt'])): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12" id="errorDisplay" style="margin-top: 15px;">
                        <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                            <img src="img/danger.png" width="24" height="24" alt=""><i style="font-size: 14px;">Le format de votre adresse mail est incorrect ! </i>
                            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span> </button>
                        </div>
                    </div>
                    
                </div>
            </div>
    <?php endif; ?>
    <?php if(!empty($_GET['nalt'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-12" id="errorDisplay" style="margin-top: 15px;">
                    <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                        <img src="img/danger.png" width="24" height="24" alt=""><i style="font-size: 14px;">Le numero entrée est invalide ! </i>
                        <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span> </button>
                    </div>
                </div>
                
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="img text-center col-12">
                <a id="toHome" href="index.php"><img src="img/logo.webp" alt="logo" width="250" height="auto"></a>
            </div>
        </div>
        <div class="row">
            <div class="form-sign-in">
                <div class="header col-12">
                    <h4>Créer un compte</h4>
                </div>
                <form action="index.php" method="post" class="col-12">
                    <label for="name" class="col-12">Votre nom</label>
                    <input type="text" required onkeyup="checkName()" name="name" id="nom_for_add_user" class="form-control col-12 regex" placeholder="Entrer votre nom">
                    <p id="error"></p>

                    <label for="number" class="col-12">Votre numero de telephone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-light bg-dark" id="basic-addon2"><img src="img/mada.png" alt="mada" width="24" height="24"> +261</span>
                        </div>
                        <input type="text" required onkeyup="checkNumber()" name="numero" id="numero" class="form-control col-12" placeholder="Numero de telephone">
                    </div>
                    <p id="errNum"></p>
                    

                    <label for="mail" class="col-12">Votre adresse Mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-light bg-dark" id="basic-addon2"><img src="img/addMAIL.png" alt="mail" width="24" height="24"></span>
                        </div>
                        <input type="text" required onkeyup="checkEmail()" name="mail" id="inputMail"class="form-control col-12 regex" placeholder="Entrer votre mail">
                    </div>
                    
                    <p id="err"></p>
                    <label for="password" class="col-12">Votre mot de passe</label>
                    <div class="input-group">
                        <input type="password" required onkeyup="checkingPassword()" name="password" id="pass" class="form-control col-12" placeholder="mot de passe">
                        <div class="input-group-append">
                            <button class="btn btn-warning" onclick="changeValue()" type="button" id="button-addon"><img src="img/vue.png" width="14" height="14" alt="vue"></button>
                        </div>
                    </div>
                    

                    <div class="verif">
                        <p class="invalid" id="capitalLetter" ><img src="img/info.png" width="14" height="14" alt=""> Votre mot de passe doit contenir au moins un lettre Majuscule</p>
                        <p class="invalid" id="lowerCapital" ><img src="img/info.png" width="14" height="14" alt=""> Votre mot de passe doit contenir au moins une lettre minuscule</p>
                        <p class="invalid" id="number" ><img src="img/info.png" width="14" height="14" alt=""> Votre mot de passe doit contenir au moins des chiffres numérique</p>
                        <p class="invalid" id="size" ><img src="img/info.png" width="14" height="14" alt=""> Votre mot de passe doit contenir au moins contenir 8 caractères</p>
                    </div>

                    <button type="submit" id="key_button" class="btn btn-success btn-sm col-12 btn-block">Ennregistrer</button>
                </form>

            </div>
        </div>
    </div>

    <div style="margin: 25px;"></div>

    <?php include('footer.php'); ?>





    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="dist/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>