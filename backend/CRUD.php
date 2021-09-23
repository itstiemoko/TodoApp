<?php

    //CRUD Class
    class CRUD
    {
        /*

            Cette classe (CRUD) nous permet de faire des modifications et récupérations de données sur notre base todo.
            Comme methode, on verra :
                listingTask() : Permet de lister les tâches.
                addTask() : Permet d'ajouter des tâches.
                modifyTask() : Permet de modifier les tâches.
                deleteTask() : Permet supprimer une tâche.

        */

        public $_pdo;   //Déclaration d'une variable (pour PDO)

        //Déclaration du construction de notre classe CRUD
        function __construct()
        {
            try
            {
                $this->_pdo = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        //Methode Lister les tâches
        function listingTask()
        {
            try
            {
                $query = 'Select * from `tasks`;';
                $listTask = $this->_pdo->prepare($query);
                $listTask->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            $listResult = $listTask->fetchAll(PDO::FETCH_ASSOC);

            return $listResult;
        }

        //Methode Ajouter une tâche
        function addTask($taskName)
        {
            try
            {
                $query = 'Insert Into `tasks`(`taskName`, `taskStatut`)Values(:name, 0);';
                $addTask = $this->_pdo->prepare($query);
                $addTask->bindParam(':name', $taskName);
                $addTask->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        //Methode Modifier une tâche
        function modifyTask($idTask)
        {
            try
            {
                $query = 'Update `tasks` Set `taskStatut`=!`taskStatut` Where taskId=:id';
                $addTask = $this->_pdo->prepare($query);
                $addTask->bindParam(':id', $idTask);
                $addTask->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        //Methode Supprimer une tâche
        function deleteTask($idTask)
        {
            try
            {
                $query = 'Delete From `tasks` Where taskId=:id';
                $deleteTask = $this->_pdo->prepare($query);
                $deleteTask->bindParam(':id', $idTask);
                $deleteTask->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        //Methode pour verifier les coordonnées de l'utilisateur dans la base
        function findUserByNameAndPassword($username, $password)
        {
            try
            {
                $query = "Select * From `users`;";
                $namePass = $this->_pdo->prepare($query);
                $namePass->execute();

                $res = $namePass->fetchAll();

                foreach($res as $val)
                {
                    if($val['userName'] == $username and $val['userPassword'] == $password)
                    {
                        return 1;
                    }

                    return 0;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


    $crud = new CRUD();

?>