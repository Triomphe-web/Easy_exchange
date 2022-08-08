<?php
//initialisation de session
session_start();
include('code_include/db.php');
// INSCRIPTION CODE
if ((isset($_POST['name'])) && (isset($_POST['mail'])) && isset($_POST['password']) && (isset($_POST['numero']))) {
  include_once('code_include/inscrit.php');
  // cree une session
  $_SESSION['numero'] = $_POST['numero'];
  $_SESSION['nom'] = $_POST['name'];  
}

// CONNECTION CODE
if (isset($_GET['salt'])) {
  $mydecodeName = base64_decode($_GET['salt']);
  $mydecodeNumber = base64_decode($_GET['xalt']);
  // cree une session
  $_SESSION['numero'] = $mydecodeNumber;
  $_SESSION['nom'] = $mydecodeName;
}

if(isset($_SESSION['numero'])){
  //affiche si utilisateur a valide son mail
  // process de verification 
  //Ecriture de la requête
  $sqlQuery = 'SELECT verifiedMail,email FROM utilisateur WHERE numero = :num';

    // Préparation
    $SelectUser = $mysqlConnection->prepare($sqlQuery);
    $SelectUser->execute([
        'num' => $_SESSION['numero'],
    ]);
    $users = $SelectUser->fetchAll();

    foreach($users as $user){
      //verifie si le verifEmail vaut 0
      if($user['verifiedMail'] == 0){
        $value = $user['verifiedMail'];
        $_SESSION['mail'] = $user['email'];
      }
      else{
        $value = null;
      }
        
    };
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>
    Easy Exchange
  </title>
</head>

<body>
  <?php if ((isset($value)) || (!empty($value))) {
    include('alert.php');
  }?>

  <?php if ((isset($_SESSION['nom'])) || (!empty($_SESSION['nom']))) {
    include('header2.php');
  } else {
    include('header.php');
  } ?>

  <?php include('jumbotron.php'); ?>

  <?php include('card.php'); ?>


  <!-- Articles recemment ajoutes  -->
  <hr id="spacer">
  <div class="row">
    <h4 class="art col-12 text-center">Article récemment ajoutée :</h4>
  </div>
  <hr>
  <?php include('featured.php'); ?>
  </div>
  </div>

  <!-- footer of page -->
  <?php include('footer.php'); ?>





  <script src="jquery/jquery-3.6.0.js"></script>
  <script src="dist/dist/js/bootstrap.bundle.min.js"></script>
  <script src="dist/dist/js/bootstrap.min.js"></script>
  <script src="xhr.js"></script>
</body>

</html>