<?php
class Task
{
    private int $idTask;
    private string $title;
    private string $description;
    private string $creation_date;
    private string $modification_date;
    private bool $it_s_done;
    private int $id_user;
    private PDO $db;
    private string $table = '`task`';



    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=todolist;charset=utf8', 'root', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function getListTasksNotDone(): array
    {
        $query = 'SELECT `id`, `title`, `description`, `creation_date`, `modification_date`,  `id_user`  FROM ' . $this->table
            . ' WHERE `it_s_done` = 0 AND `id_user` = :id_user';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $queryStatement->execute();
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getListTasksDone(): array
    {
        $query = 'SELECT `id`, `title`, `description`, `creation_date`, `modification_date`,  `id_user`  FROM ' . $this->table
            . ' WHERE `it_s_done` = 1 AND `id_user` = :id_user';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $queryStatement->execute();
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTaskById(): object
    {
        $query = 'SELECT `id`, `title`, `description`, `creation_date`, `modification_date`, `id_user`  FROM ' . $this->table
            . 'WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->idTask, PDO::PARAM_INT);
        $queryStatement->execute();
        return $queryStatement->fetch(PDO::FETCH_OBJ);
    }

    public function addTask(): bool
    {
        $query = 'INSERT INTO ' . $this->table . '(`title`, `description`, `creation_date`, `it_s_done`, `id_user`)'
            . 'VALUES (:title, :description, :creation_date, :it_s_done, :id_user)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryStatement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryStatement->bindValue(':creation_date', $this->creation_date, PDO::PARAM_STR);
        $queryStatement->bindValue(':it_s_done', 0, PDO::PARAM_STR);
        $queryStatement->bindValue(':id_user', $this->id_user, PDO::PARAM_STR);
        return $queryStatement->execute();
    }

    public function isDoneTask(): bool
    {
        $query = 'UPDATE ' . $this->table . ' SET `it_s_done` = :it_s_done
        WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->idTask, PDO::PARAM_INT);
        $queryStatement->bindValue(':it_s_done', true, PDO::PARAM_BOOL);
        return $queryStatement->execute();
    }

    public function updateTaskById(): bool
    {
        $query = 'UPDATE ' . $this->table . ' SET `title` = :title, `description` = :description, `modification_date` = :modification_date
        WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->idTask, PDO::PARAM_STR);
        $queryStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryStatement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryStatement->bindValue(':modification_date', $this->modification_date, PDO::PARAM_STR);
        return $queryStatement->execute();
    }

    public function deleteTask(): bool
    {
        $query = 'DELETE FROM ' . $this->table
            . 'WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->idTask, PDO::PARAM_INT);
        return $queryStatement->execute();
    }

    /**
     * @param int $idTask
     */
    public function setIdTask(int $idTask): void
    {
        $this->idTask = $idTask;
    }

    /**
     * @return int
     */
    public function getIdTask(): int
    {
        return $this->idTask;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $creation_date
     */
    public function setCreationDate(string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    /**
     * @param string $modification_date
     */
    public function setModificationDate(string $modification_date): void
    {
        $this->modification_date = $modification_date;
    }

    /**
     * @return string
     */
    public function getModificationDate(): string
    {
        return $this->modification_date;
    }

    /**
     * @param bool $it_s_done
     */
    public function setItSDone(bool $it_s_done): void
    {
        $this->it_s_done = $it_s_done;
    }

    /**
     * @return bool
     */
    public function getIsItSDone(): bool
    {
        return $this->it_s_done;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }
}