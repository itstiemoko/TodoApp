-- Création de la base To-Do
Drop Database If Exists `todo`; -- Supprime la base todo si elle existe

Create Database If Not Exists `todo`;   -- Créer la base todo si elle n'existe pas

Use `todo`; -- Utilise cette base

-- Création des tables
Create Table If Not Exists `tasks`
(
    `taskId` Int Not Null Auto_increment,
    `taskName` Varchar(50) Not Null,
    `taskStatut` Boolean Not Null,
    Primary Key(`taskId`)
);

Create Table If Not Exists `users`
(
    `userId` Int Not Null Auto_increment,
    `userName` Varchar(20) Not Null,
    `userPassword` Varchar(30) Not Null,
    `taskId` Int Not Null,
    Foreign Key(`taskId`) References `tasks`(`taskId`) On Delete Cascade,
    Primary Key(`userId`)
);

-- Enregistrements des données
Insert Into `tasks`(`taskName`, `taskStatut`)
Values('Tâche one', 0),
('Tâche two', 1),
('Tâche three', 0);

Insert Into `users`(`userName`, `userPassword`, `taskId`) Values('hello', 'hello', 1);