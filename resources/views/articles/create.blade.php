<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un article</title>
    <style>
        body { font-family: sans-serif; padding: 50px; max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 15px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        .error { color: red; font-size: 14px; }
        .success { color: green; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>Ajouter un nouvel article</h1>

    <!-- Message de succès si l'article est bien enregistré -->
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- Le formulaire -->
    <form action="/articles" method="POST" enctype="multipart/form-data">
        <!-- DIRECTIVE OBLIGATOIRE (vu en cours) pour protéger le formulaire -->
        @csrf

        <div class="form-group">
            <label for="title">Titre de l'article :</label>
            <!-- value="{{ old('title') }}" permet de garder le texte si le formulaire échoue -->
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            
            <!-- Affichage de l'erreur pour le titre -->
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenu :</label>
            <textarea name="content" id="content" rows="5">{{ old('content') }}</textarea>
            
            <!-- Affichage de l'erreur pour le contenu -->
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image d'illustration :</label>
            <input type="file" name="image" id="image">
        </div> 

        <button type="submit" style="padding: 10px 20px;">Publier l'article</button>
    </form>

</body>
</html>