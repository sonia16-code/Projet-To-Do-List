<?php
require_once(__DIR__ . '/../../config/function.php');
require_once(__DIR__ . '/../Models/Task.php');

if (isset($_SESSION['user'])) {
    $task = new Task;

    $myUser = $_SESSION['user']['idUser'];

    $task->setIdUser($myUser);
    $tasksList = $task->getListTasksNotDone();
    $tasksListDone = $task->getListTasksDone();

    if (isset($_POST['idDone'])) {
        $id = $_POST['idDone'];
        $task->setIdTask($id);
        $task->isDoneTask();
        redirectToRoute('/task');
    }

    if (isset($_POST['idDelete'])) {
        $id = $_POST['idDelete'];
        $task->setIdTask($id);
        $task->deleteTask();
        redirectToRoute('/task');
    }
}




require_once(__DIR__ . '/../Views/home.view.php');
