<?php

class User
{
    // Définir les propriétés

    /**
     * Identifiant unique de l'utilisateur (int).
     */
    private int $userId;

    /**
     * Nom d'utilisateur choisi par l'utilisateur (string).
     */
    private string $pseudo;

    /**
     * Adresse email de l'utilisateur (string).
     */
    private string $email;

    /**
     * Mot de passe de l'utilisateur (hash, string).
     *
     * **Important:** Cette propriété ne doit jamais stocker le mot de passe en clair.
     * Hacher toujours le mot de passe avant de le stocker dans la base de données.
     */
    private string $password;

    private PDO $db;

    private string $table = '`user`';
    /**
     * Constructeur - Initialise la connexion à la base de données.
     *
     * Cette méthode tente de se connecter à la base de données via PDO.
     * Elle lève une exception si la connexion échoue.
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=todolist;charset=utf8', 'root', 'root');
        } catch (Exception $error) {
            die($error->getMessage()); // Terminer le script avec un message d'erreur
        }
    }

    public function getUserList()
    {
        $query = 'SELECT `id`, `pseudo`, `email` FROM ' . $this->table;
        $queryStatement = $this->db->query($query);
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet de cheket si l'utilisateur existe par l'adresse mail
     *
     * @return bool
     */
    public function checkUserExists(): bool
    {
        $query = 'SELECT `id` FROM ' . $this->table
            . ' WHERE `email` = :email ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        $result = $queryStatement->fetchAll(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de user identique
        return !empty($result);
    }

    /**
     * Permet de récupérer le hash du password et le token d'inscription
     *
     * @return object
     */
    public function getLoginInfo(): object
    {
        $query = 'SELECT `password`, `id`, `pseudo`,`email` FROM ' . $this->table
            . ' WHERE `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        return $queryStatement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode pour enregistré dans la base de donner un nouveau utilisateur.
     *
     *@return bool
     */
    public function saveUser(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' (`pseudo`, `email`, `password`) '
            . ' VALUES (:pseudo, :email, :password)';

        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryStatement->execute();
    }

    /**
     * Définit l'adresse email de l'utilisateur.
     *
     * @param string $email L'adresse email de l'utilisateur.
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Définit le mot de passe de l'utilisateur.
     *
     * @param string $password Le mot de passe de l'utilisateur.
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Définit le pseudo de l'utilisateur.
     *
     * @param string $pseudo Le pseudo de l'utilisateur.
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Définit l'ID de l'utilisateur.
     *
     * @param int $userId L'ID de l'utilisateur.
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * Récupère l'adresse email de l'utilisateur.
     *
     * @return string L'adresse email de l'utilisateur.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Récupère l'ID de l'utilisateur.
     *
     * @return int L'ID de l'utilisateur.
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Récupère le mot de passe de l'utilisateur.
     *
     * @return string Le mot de passe de l'utilisateur.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Récupère le pseudo de l'utilisateur.
     *
     * @return string Le pseudo de l'utilisateur.
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
}
