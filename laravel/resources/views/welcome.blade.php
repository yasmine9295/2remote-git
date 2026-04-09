<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tâches</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
    <ul>
        <li><a href="index.html">Accueil</a></li>
        <!-- <li><a href="/ateliers/programmes">Liste des tâches</a></li> -->
        <li><a href="/clients/contact">Contact</a></li>
    </ul>
</nav>

<h1>Ajouter une tâche</h1>

<div class="input-group">
    <input type="text" id="taskInput" placeholder="Nouvelle tâche">
    <button onclick="addTask()">Ajouter</button>
</div>

<ul id="taskList"></ul>

<script>
    window.onload = renderLocalTasks;

    function addTask() {
        const input = document.getElementById('taskInput');
        if (input.value.trim() === '') return;

        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        ateliers.push(input.value);
        localStorage.setItem('mesAteliers', JSON.stringify(ateliers));

        input.value = '';
        renderLocalTasks();
    }

    function deleteTask(index) {
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        ateliers.splice(index, 1);
        localStorage.setItem('mesAteliers', JSON.stringify(ateliers));
        renderLocalTasks();
    }

    function editTask(index) {
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        let newName = prompt("Modifier la tâche :", ateliers[index]);
        if (newName !== null && newName.trim() !== "") {
            ateliers[index] = newName;
            localStorage.setItem('mesAteliers', JSON.stringify(ateliers));
            renderLocalTasks();
        }
    }

    function renderLocalTasks() {
        const list = document.getElementById('taskList');
        list.innerHTML = ''; 
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        
        ateliers.forEach(function(nom, index) {
            let li = document.createElement('li');
            li.innerHTML = `
                <span>${nom}</span>
                <div>
                    <button class="btn-edit" onclick="editTask(${index})">Modifier</button>
                    <button class="btn-delete" onclick="deleteTask(${index})">Supprimer</button>
                </div>
            `;
            list.appendChild(li);
        });
    }
</script>
</body>
</html>



<style>/* Configuration générale */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f6;
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Barre de navigation */
.navbar {
    width: 100%;
    background: #333;
    padding: 10px 0;
    margin-bottom: 30px;
    border-radius: 8px;
}

.navbar ul {
    list-style: none;
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 0;
}

.navbar li { margin: 0 15px; }

.navbar a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

/* Conteneur principal */
h1 { color: #444; }

/* Zone de saisie */
#taskInput {
    padding: 12px;
    width: 250px;
    border: 2px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s;
}

#taskInput:focus { border-color: #2ecc71; }

button {
    padding: 12px 20px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #2ecc71;
    color: white;
    font-weight: bold;
    transition: background 0.3s;
}

button:hover { background-color: #27ae60; }

/* Liste des tâches */
#taskList {
    list-style: none;
    padding: 0;
    width: 100%;
    max-width: 400px;
    margin-top: 30px;
}

#taskList li {
    background: white;
    margin-bottom: 10px;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Boutons d'action dans la liste */
.btn-edit {
    background-color: #3498db;
    padding: 5px 10px;
    font-size: 12px;
    margin-left: 10px;
}

.btn-edit:hover { background-color: #2980b9; }

.btn-delete {
    background-color: #e74c3c;
    padding: 5px 10px;
    font-size: 12px;
    margin-left: 5px;
}

.btn-delete:hover { background-color: #c0392b; }

</style>