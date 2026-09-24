<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Blog</title>
    <style>
        body { font-family: sans-serif; padding: 50px; max-width: 800px; margin: auto; }
        .article { 
            background: #f9f9f9; 
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 8px; 
            border-left: 5px solid #ff2d20; 
        }
        .date { color: #888; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h1>Liste des articles</h1>
    
    <a href="/creer-article" style="display:inline-block; margin-bottom: 30px;">+ Écrire un nouvel article</a>

    <!-- Vérifie s'il y a des articles -->
    @if($articles->isEmpty())
        <p>Aucun article n'a été publié pour le moment.</p>
    @else
        <!-- Boucle sur chaque article -->
        @foreach($articles as $article)
            <div class="article">
                <h2>{{ $article->title }}</h2>
                <p class="date">Publié le {{ $article->created_at->format('d/m/Y à H:i') }}</p>
                <p>{{ $article->content }}</p>
            </div>
        @endforeach
    @endif

</body>
</html>