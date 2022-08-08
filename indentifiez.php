<?php
    //initialisation de session
    session_start();
    if(isset($_SESSION['nom']) && !empty($_SESSION['nom'])){
        header("Location:index.php");
        die();
    }

    $val = ''; 
    $val2 = '';
    if(isset($_GET['salt']) && !empty($_GET['salt'])){
        if($_GET['salt'] === 'sign-in'){
            $val = $_GET['salt'];
        }
        elseif ($_GET['salt'] === 'not-in') {
            $val2 = $_GET['salt'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>S'Identifier</title>
</head>
<body>
    <?php if(!empty($val)): ?>
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
    <?php if(!empty($val2)): ?>
        <div class="container">
            <div class="row">
                <div class="col-12" id="errorDisplay" style="margin-top: 15px;">
                    <div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
                        <img src="img/danger.png" width="24" height="24" alt=""><i style="font-size: 14px;">Vos identifiants sont invalide ! </i>
                        <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span> </button>
                    </div>
                </div>
                
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="img text-center col-12">
                <a href="index.php"><img src="img/logo.webp" alt="logo" width="250" height="auto"></a>
            </div>
        </div>
        <div class="row">
            <div class="form col-12">
                <div class="form-sign-in">
                    <h4 class="col-12">S'identifier</h4>
                    <label class="col-12 labelForm">Entrer votre adresse e-mail</label>
                    <form action="checkPassword.php" method="post">
                        <div class="input-group">
                            <input type="text" required name="mail" id="inputMail" onkeyup="checkEmail()" class="form-control col-12" required placeholder="Votre identifiant">
                            <div class="input-group-append">
                                <span class="input-group-text text-light bg-primary" id="basic-addon2">@gmail.com</span>
                            </div>
                        </div>
                        <i id="err"></i>
                        


                    <label for="mot" class="col-12 labelForm">Mot de passe</label>
                    <input type="password" required name="pass" id="pass" class="col-12 form-control text-sm" placeholder="Entrer votre mot de passe">
                    <div class="check col-12 flex" style="margin-top: 15px; margin-left: -15px;">
                        <input type="checkbox" onclick="changeValue()" id="check" class="form-control col-1" style="margin-left: 0; margin-top: -5px;">
                        <label for="" class="col-11" style="font-size: 14px;">Afficher mot de passe</label>
                    </div>
                        <button type="submit" id="key_button" class="btn btn-primary col-12 btn-block btn-sm" style="margin-top: 15px;">Continuer</button>
                    </form>
                    <p class="condition">En passant votre commande vous accepter les conditions de ventes de Easy Exchange Company.
                    </p>

                    <p class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 12px;">
                        <img src="img/icons8-sort-down-48.png" alt="SORT" width="10" height="10">Condition génerale
                    </button>
                    </p>
                    <div id="collapseOne"  class="collapse fade" aria-labelledby="headingOne" data-parent="#accordion">
                       <div class="body">
                           <ul>
                               <li style="font-size: 12px;">Les virements s'éffectuent légalement avec votre numero(Mvola,OrangeMoney,...) </li>
                               <li style="font-size: 12px;">Les produits une fois vendus ne serait plus disponible</li>
                               <li style="font-size: 12px;">Vous devez vous authentifiées pour effectuer des achats</li>
                           </ul>
                       </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="row">
            <p class="col-12 text-center condition" style="margin-top: 15px;">Nouveaux chez Easy Exchange Company</p>
        </div>
        <div class="row">
            <div class="form-sign-out">
                <a href="addNewUser.php" class="btn btn-default btn-success col-12 btn-block btn-sm">Créer votre compte Easy Exchange</a>
            </div>
        </div>
    </div>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="dist/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>