<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer la Liste</title>
    <link rel="stylesheet" href="/style.css">
    
</head>
<body>

<nav class="navbar">
    <ul>
        <li><a href="/">Accueil</a></li>
    </ul>
</nav>

<h1>Gérer les ateliers</h1>

<div class="input-group">
    <input type="text" id="taskInput" placeholder="Nouvel atelier">
    <button onclick="addTask()">Ajouter</button>
</div>

<ul id="taskList"></ul>

<script>
    window.onload = renderTasks;

    function addTask() {
        const input = document.getElementById('taskInput');
        if (input.value.trim() === '') return;

        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        ateliers.push(input.value);
        localStorage.setItem('mesAteliers', JSON.stringify(ateliers));

        input.value = '';
        renderTasks();
    }

    function deleteTask(index) {
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        ateliers.splice(index, 1);
        localStorage.setItem('mesAteliers', JSON.stringify(ateliers));
        renderTasks();
    }

    function editTask(index) {
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        let currentName = ateliers[index];
        let newName = prompt("Modifier le nom de l'atelier :", currentName);

        if (newName !== null && newName.trim() !== "") {
            ateliers[index] = newName.trim();
            localStorage.setItem('mesAteliers', JSON.stringify(ateliers));
            renderTasks();
        }
    }

    function renderTasks() {
        const list = document.getElementById('taskList');
        list.innerHTML = '';
        let ateliers = JSON.parse(localStorage.getItem('mesAteliers')) || [];
        
        ateliers.forEach(function(nom, index) {
            let li = document.createElement('li');
            
            let span = document.createElement('span');
            span.textContent = nom;
            li.appendChild(span);

            let div = document.createElement('div');

            let editBtn = document.createElement('button');
            editBtn.textContent = "Modifier";
            editBtn.className = "btn-edit";
            editBtn.onclick = () => editTask(index);

            let deleteBtn = document.createElement('button');
            deleteBtn.textContent = "Supprimer";
            deleteBtn.className = "btn-delete";
            deleteBtn.onclick = () => deleteTask(index);

            div.appendChild(editBtn);
            div.appendChild(deleteBtn);
            li.appendChild(div);
            list.appendChild(li);
        });
    }
</script>

</body>
</html>



<style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff0f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background: #ff69b4;
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
        }

        h1 { color: #d02090; }

        .input-group {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
        }

        #taskInput {
            padding: 12px;
            width: 250px;
            border: 2px solid #ffc0cb;
            border-radius: 8px;
            outline: none;
        }

        #taskInput:focus { border-color: #ff69b4; }

        button {
            padding: 12px 20px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            background-color: #ff69b4;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover { background-color: #ff1493; }

        #taskList {
            list-style: none;
            padding: 0;
            width: 100%;
            max-width: 450px;
            margin-top: 30px;
        }

        li {
            background: white;
            margin-bottom: 12px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-left: 5px solid #ff69b4;
        }

        .btn-edit {
            background-color: #f08080;
            font-size: 12px;
            margin-left: 5px;
        }

        .btn-delete {
            background-color: #db7093;
            font-size: 12px;
            margin-left: 5px;
        }
    </style>