<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Super Page</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; }
        img { max-width: 400px; border-radius: 10px; }
        .description { color: #555; font-size: 18px; margin-top: 20px; }
        
        .admin-zone { 
            background-color: #fff0f0; 
            border: 2px dashed #ff0000; 
            padding: 20px; 
            margin-top: 40px; 
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <h1>Découverte de mon projet Laravel</h1>
    
    <img src="{{ asset('mon-image.jpg') }}" alt="Une belle image">
    
    <p class="description">
        Ceci est une description simple pour répondre à la consigne. 
        Cette page est propulsée par le moteur Blade de Laravel !
    </p>

    <!-- Vérification native pour le rôle Admin -->
    @if(auth()->check() && auth()->user()->hasRole('admin'))
        <div class="admin-zone">
            <h2>Zone Administrateur</h2>
            <p>Félicitations, vous voyez ce bloc car vous êtes connecté avec le rôle "admin".</p>
        </div>
    @endif

    <!-- Vérification native pour la permission -->
    @if(auth()->check() && auth()->user()->can('voir_page_secrete'))
        <button style="margin-top: 20px; padding: 10px 20px;">
            Bouton d'édition protégé
        </button>
    @endif

</body>
</html>