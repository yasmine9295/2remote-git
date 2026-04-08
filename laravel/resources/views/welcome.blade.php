<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
    <ul>
        <li><a href="index.html">Accueil</a></li>
        <li><a href="liste.html">Liste</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>

<h1>Liste</h1>

<input type="text" id="taskInput" placeholder="Nouvelle tâche">
<button onclick="addTask()">Ajouter</button>

<ul id="taskList"></ul>

<script src="script.js"></script>
</body>
</html>