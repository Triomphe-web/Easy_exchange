<?php
//initialisation de session
session_start();
if((isset($_POST['pass'])) && (isset($_POST['oldpass']))){
    include('../code_include/db.php');
    //Ecriture de la requête
    $sqlQuery = 'SELECT motDePasse FROM utilisateur WHERE numero = :num';
    // Préparation
    $SelectUser = $mysqlConnection->prepare($sqlQuery);
    $SelectUser->execute([
        'num' => $_SESSION['numero'],
    ]);
    $users = $SelectUser->fetchAll();
    foreach($users as $user){
        $pass = $user["motDePasse"];
    }
    $verified = password_verify($_POST["oldpass"],$pass);
    if ($verified) {
        $hash = password_hash($_POST['pass'],PASSWORD_BCRYPT);
        //Ecriture de la requête
        $sql = 'UPDATE utilisateur SET motDePasse = :pass WHERE numero = :numero';
        $updateRecipe = $mysqlConnection->prepare($sql);

        $updateRecipe->execute([
            'pass' => $hash,
            'numero' => $_SESSION['numero'],
        ]);
        echo "Match_and_modified";
    }
    else {
        echo "Not_Match";
    }
        
}
?>