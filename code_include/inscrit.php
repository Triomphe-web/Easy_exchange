<?php
// inscription processus


    $nom = $_POST['name'];
    $mail = $_POST['mail'];
    $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $num = $_POST['numero'];
    $verified = 0;

    // process de inscription 
    //Ecriture de la requête

    $sqlQuery = 'INSERT INTO utilisateur(nom,email,numero,motDePasse,verifiedMail) VALUES (:nom, :mail, :num, :pass, :verified)';

    // Préparation
    $insertRecipe = $mysqlConnection->prepare($sqlQuery);

    // Exécution ! L'utilisateur est maintenant en base de données
    $insertRecipe->execute([
        'nom' => $nom,
        'mail' => $mail,
        'num' => $num,
        'pass' => $hash,
        'verified' => $verified,
    ]);

    

?>