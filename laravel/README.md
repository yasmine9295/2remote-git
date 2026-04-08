# To-Do List App (Laravel)

## Description du projet

Ce projet est une application de type "to do list" développée avec Laravel.

Le but est de permettre à un utilisateur de gérer une liste de tâches.
Il pourra ajouter, modifier, supprimer.

---

## Fonctionnalités

* Ajouter une tâche
* Afficher la liste des tâches
* Modifier une tâche
* Supprimer une tâche

---

## Technologies utilisées

* PHP, javascript css
* Laravel
---

## Installation

1. Cloner le projet :

```bash
git clone https://github.com/yasmine9295/git-esgi.git
```

2. Accéder au dossier :

```bash
cd your-project
```

3. Installer les dépendances :

```bash
composer install
```

4. Copier le fichier d’environnement :

```bash
cp .env.example .env
```

5. Générer la clé de l’application :

```bash
php artisan key:generate
```

6. Configurer la base de données dans le fichier `.env`

7. Lancer les migrations :

```bash
php artisan migrate
```

8. Démarrer le serveur :

```bash
php artisan serve
```

---

## Structure du projet

* `routes/web.php` : routes de l’application
* `app/Models` : modèles
* `app/Http/Controllers` : contrôleurs
* `resources/views` : vues

---