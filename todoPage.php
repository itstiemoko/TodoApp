<?php

    require_once 'backend/CRUD.php';

    $listTask = $crud->listingTask();

?>


<!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/todoPage.css">
    <title>To Do App</title>
    <body>
        <div class="container">
            <h1>To-do App</h1>
            
            <div class="add-tasks">
                <form action="backend/result.php" method="GET">
                    <input id="add" name="addTask" type="text" placeholder="Ajouter une tâche...">
                    <button id="btn"><i class="fas fa-plus"></i></button>
                </form>
            </div>

            <div class="task-list">
                <ul id="list">
                    <form action="backend/result.php" method="GET">
                        <?php foreach($listTask as $result): ?>
                        <li><input type="checkbox" <?php if($result['taskStatut']==1){echo 'checked';}?>><?= $result['taskName'] ?><button value="<?= $result['taskId']?>"  name="removeTask"><i class="fas fa-trash"></i></button></li>
                        <?php endforeach; ?>
                    </form>
                </ul>
            </div>
            
        </div>
    </body>
</html>