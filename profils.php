<?php
//initialisation de session
session_start();
include('code_include/db.php');
if(isset($_SESSION['numero'])){
    //Ecriture de la requête
    $sqlQuery = 'SELECT * FROM utilisateur WHERE numero = :num';
    // Préparation
    $SelectUser = $mysqlConnection->prepare($sqlQuery);
    $SelectUser->execute([
        'num' => $_SESSION['numero'],
    ]);
    $users = $SelectUser->fetchAll();

    foreach($users as $user){
        $nom = $user["nom"];
        $mail = $user["email"]; 
        $num = $user["numero"];
        $mail_verif = $user["verifiedMail"];   
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
    <link rel="stylesheet" href="css/profil.css">
    <title>⛪Profil</title>
</head>
<body class="bg-dark">
<?php if ((isset($_SESSION['nom'])) || (!empty($_SESSION['nom']))) {
    include('header2.php');
} else {
    include('header.php');
} ?>
<div class="cacher" id="loader"></div>

<?php if ($mail_verif == 0) {
include('alert.php');
}?>

<div class="jumbotron col-12">
    <div class="container">
        <div class="row">
            <h1 class="display-2 col-12 text-center">
                Easy Exchange Profil
            </h1>
            <h2 class="col-12 text-center" id="p_deal">Parametrée votre compte Easy</h2><br>
            
        </div>
    </div>
</div>
<div class="cacher" id="msg"></div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 profil">
                    <!-- NOM FORMUALAIRE -->
                    <h4 class="text-light mt-5 mb-4">Identifiant : <i class="text-primary">@<?php echo $nom; ?></i></h4>
                    
                    
                    <!-- ADRESSE MAIL FORMULAIRE -->
                    <h4 class="text-light">Adresse email : 
                        <i class="text-primary"><?php echo $mail; ?></i>
                    </h4>
                    <?php if ($mail_verif == 0) { ?>      
                           <p class="text-danger"> <span class="badge badge-warning">1 </span> Votre adresse email n'a pas encore été verifiée ! pour activer votre compte</p> 
                    <?php }?>
                    


                    <!-- NUMERO FORMULAIRE -->
                    <h4 class="text-light mb-4">Numéro : <i class="text-primary numero">0<?php echo $num; ?></i></h4>
                    

                    <!-- MOT DE PASSE FORMULAIRE -->
                    <h4 class="text-light">Mot de passe : </h4>    
                    <div id="msgPass"></div>
                    <div class="row mb-5">
                        <input type="text" id="oldpass" class="form-control col-3" placeholder="Ancien mot de passe">
                        <div class="input-group col-9">
                            <input type="text" id="passField" class="form-control" placeholder="Nouveau mot de passe">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Validation choix</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment mettre a jour votre mot de passe !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="changePassword()" class="btn btn-danger" data-dismiss="modal">Modifier</button>
            </div>
            </div>
        </div>
        </div>
    </main>

    
    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="dist/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/dist/js/bootstrap.min.js"></script>
    <script src="xhr.js"></script>
</body>
</html>