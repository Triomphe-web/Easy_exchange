<?php 

   if(isset($_POST['mail']) && isset($_POST['pass'])){
        $mail_valide = $_POST['mail'].'@gmail.com';
        $userMail = $_POST['mail'];
        if(!filter_var($mail_valide,FILTER_VALIDATE_EMAIL)){
            //redirect
            $err = "sign-in";
            header("Location:indentifiez.php?salt=".$err);
            die();
            }
        else{
            $email = $_POST['mail'];
            $pass = $_POST['pass'];
        }

   }

    include('code_include/db.php');
    // process de verification 
    //Ecriture de la requête
    $sqlQuery = 'SELECT * FROM utilisateur WHERE email = :mail';

     // Préparation
     $SelectUser = $mysqlConnection->prepare($sqlQuery);
     $SelectUser->execute([
         'mail' => $mail_valide,
     ]);
     $users = $SelectUser->fetchAll();

     foreach($users as $user){
         $myEmail = $user['email'];
         $myNumero = $user['numero'];
         $myName = $user['nom'];
     };
     //verify password
     $mypass = $user['motDePasse'];
     $verified = password_verify($pass,$mypass);
     if(empty($myEmail) || $verified == false){
        //redirect
        $err = "not-in";
        header("Location:indentifiez.php?salt=".$err);
        die();
      }
      else{
        // $myHashEmail = base64_encode($myEmail);
        // echo $myHashEmail.'<br>';

        $myHashName = base64_encode($myName);
        echo $myHashName;

        $myHashNumber = base64_encode($myNumero);
        echo $myHashNumber;
                
        header("Location:index.php?salt=$myHashName&xalt=$myHashNumber");
        die(); 
    }      
?>

