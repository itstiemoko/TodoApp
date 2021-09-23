<?php
    require_once 'CRUD.php';

    if(isset($_GET['removeTask']) AND !empty($_GET['removeTask']))
    {
        $crud->deleteTask($_GET['removeTask']); //Suppression d'une tâche
        header('Location: ../todoPage.php');    //Redirection vers todoPage.php
    }
    elseif((isset($_GET['addTask']) AND !empty($_GET['addTask'])))
    {
        $crud->addTask($_GET['addTask']);   //Ajout d'une tâche
        header('Location: ../todoPage.php');
    }
    elseif(isset($_POST['username']) AND !empty($_POST['username']))
    {
        if((isset($_POST['password']) AND !empty($_POST['password'])))
        {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $namePass = $crud->findUserByNameAndPassword($username, $pass); //Vérification des coordonnées de User
            
            if($namePass)
            {
                header('Location: ../todoPage.php');
            }
            else
            {
                echo "Invalide username or password";
            }
        }
    }
    else
    {
        echo "Error...";
    }

?>