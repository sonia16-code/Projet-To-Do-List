<?php
require_once(__DIR__ . '/../Models/Task.php');
require_once(__DIR__ . '/../../config/function.php');
$task = new Task;

if (isset($_GET['id'])) {
    $myTask = new Task;
    $myTask->setIdTask($_GET['id']);
    $myResult = $myTask->getTaskById();

    if (isset($_POST['title'])) {
        $myTask->setTitle(htmlspecialchars($_POST['title']));
        $myTask->setDescription(htmlspecialchars($_POST['description']));
        $myTask->setModificationDate(date('Y-m-d'));
        $myTask->updateTaskById();
        redirectToRoute('/task');
    }
}


if (isset($_POST['title'])) {
    $task->setTitle(htmlspecialchars($_POST['title']));
    $task->setDescription(htmlspecialchars($_POST['description']));
    $task->setCreationDate(date('Y-m-d'));
    $task->setIdUser($_SESSION['user']['idUser']);
    $task->addTask();
    redirectToRoute('/task');
}

require_once(__DIR__ . '/../Views/task/task.view.php');