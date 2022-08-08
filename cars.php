<?php
//initialisation de session
session_start();
include('code_include/db.php');
if(isset($_SESSION['numero'])){
  //affiche si utilisateur a valide son mail
  // process de verification 
  //Ecriture de la requête
  $sqlQuery = 'SELECT verifiedMail FROM utilisateur WHERE numero = :num';

    // Préparation
    $SelectUser = $mysqlConnection->prepare($sqlQuery);
    $SelectUser->execute([
        'num' => $_SESSION['numero'],
    ]);
    $users = $SelectUser->fetchAll();

    foreach($users as $user){
      if($user['verifiedMail'] == 0){
        $value = $user['verifiedMail'];
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
    <title>Document</title>
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
    <div class="container-fluid">
      <div class="row col-12 flex">
          <a href="crypto.php" class="card">  
              <span>Easy Crypto Exchange</span>     
          </a>

          <a href="cars.php" class="card">
            <span>Easy Cars Exchange</span>
          </a>

          <a href="tech.php" class="card">
            <span>Easy Tech Exchange</span>
          </a>

          <a href="immo.php" class="card">
            <span>Easy Immo Exchange</span>
          </a>
      </div>
</div>

  <script src="jquery/jquery-3.6.0.js"></script>
  <script src="dist/dist/js/bootstrap.bundle.min.js"></script>
  <script src="dist/dist/js/bootstrap.min.js"></script>
</body>
</html>