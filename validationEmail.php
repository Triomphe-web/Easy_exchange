<?php
//initialisation de session
session_start();
echo $_SESSION['mail'];
$valid = 1;
$encode = base64_encode($valid);
include('code_include/db.php');

$sql = 'UPDATE utilisateur SET verifiedMail = :valid WHERE email = :mail';
$updateRecipe = $mysqlConnection->prepare($sql);

$updateRecipe->execute([
    'valid' => $valid,
    'mail' => $_SESSION['mail'],
]);

header("Location:index.php");
die();
?>
