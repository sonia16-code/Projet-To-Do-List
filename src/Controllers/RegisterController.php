<?php
require_once(__DIR__ . '/../Models/User.php');
require_once(__DIR__ ."/../../config/function.php");


$user = new User;

// on vérifie que le formulaire a ete envoyé
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
    // on met les informations du formulaire dans des variables
    $pseudo= $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // verification de la validité de l'email puis de la presence de l'email en bdd
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorInvalidEmail="Invalid Email";
        require_once(__DIR__ . '/../Views/security/register.view.php');
        exit;
    }


$user->setEmail(htmlspecialchars($email));

if (!$user->checkUserExists()) {
    $passwordValid = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password);

    if ($passwordValid) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user->setPassword($passwordHash);
        $user->setPseudo(htmlspecialchars($pseudo));
        $user->saveUser();
        redirectToRoute('/login');
    } else {
        $errorPassword = "
        Le mot de passe est invalide, il doit avoir : <br>
        - Au moins 8 caractères<br>
        - Au moins un caractère en majuscule<br>
        - Au moins un caractère en minuscule<br>
        - Au moins un chiffre<br>
        - Au moins un caractère spécial";

    }
} else {
    $errorInvalidEmail = "L'adresse e-mail que vous avez saisie est déjà utilisée. Veuillez choisir une autre adresse e-mail";
}
}


require_once(__DIR__ . '/../Views/security/register.view.php');

?>