<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
    <style>
        body { font-family: sans-serif; padding: 50px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; }
        input, textarea { width: 300px; padding: 8px; }
        button { padding: 10px 20px; background: #3490dc; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Contactez-nous</h1>

    <form action="/contact" method="POST">
        @csrf <!-- Protection obligatoire dans Laravel -->
        
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Message :</label>
            <textarea name="message" rows="5" required></textarea>
        </div>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>

        <li><a href="/">Accueil</a></li>
