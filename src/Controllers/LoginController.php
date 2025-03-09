<?php
require_once(__DIR__ . '/../Models/User.php');
require_once(__DIR__ ."/../../config/function.php");

$user = new User;

if (isset($_SESSION['user'])){
    redirectToRoute('/');
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
        // on met les information du formulaire dans des variable
        $email = $_POST['email'];
        $password = $_POST['password'];

    $user->setEmail($email);
    $userConnection = $user->checkUserExists();

    //S'il existe on récupéré les informations
    if($userConnection){
        $loginInfo = $user->getLoginInfo();

        if(password_verify($password, $loginInfo->password)){
            $_SESSION['user'] = [
            'id' => uniqid(),
            'email' => $loginInfo->email,
            'pseudo' => $loginInfo->pseudo,
            'idUser' => $loginInfo->id,
            ];
            redirectToRoute('/task');
        } else {
            $errorInvalidLogin = "Adresse e-mail ou mot de passe incorrect. Veuillez vérifier vos informations et réessayer.";
            require_once(__DIR__ . '/../Views/security/login.view.php');
            exit;
        }
    } else {

        $errorInvalidLogin="Adresse e-mail ou mot de passe incorrect. Veuillez vérifier vos informations et réessayer.";
    }

}


require_once(__DIR__ . '/../Views/security/login.view.php');

?>