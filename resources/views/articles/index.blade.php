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

    <!-- 1. Début de la vérification principale -->
    @if($articles->isEmpty())
        <p>Aucun article n'a été publié pour le moment.</p>
    @else
        <!-- 2. Début de la boucle des articles -->
        @foreach($articles as $article)
            <div class="article">
                <h2>{{ $article->title }}</h2>
                
                <!-- Vérification de l'image -->
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Image" style="max-width: 100%; border-radius: 8px;">
                @endif

                <p class="date">Publié le {{ $article->created_at->format('d/m/Y à H:i') }}</p>
                <p>{{ $article->content }}</p>

                <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">
                
                <h4>Commentaires :</h4>
                <!-- Boucle des commentaires -->
                @foreach($article->comments as $comment)
                    <p style="font-size: 14px; background: #fff; padding: 10px; border-radius: 5px;">
                        <strong>{{ $comment->user->name }} :</strong> {{ $comment->content }}
                    </p>
                @endforeach

                <!-- Vérification de connexion -->
                @auth
                    <form action="/articles/{{ $article->id }}/comments" method="POST" style="margin-top: 15px;">
                        @csrf
                        <textarea name="content" rows="2" placeholder="Ajouter un commentaire..." required style="width: 100%; margin-bottom: 5px;"></textarea>
                        <button type="submit">Commenter</button>
                    </form>
                @else
                    <p style="color: #888; font-style: italic;">Vous devez vous <a href="/login">connecter</a> pour commenter.</p>
                @endauth

            </div>
        @endforeach <!-- Fin de la boucle des articles -->
    @endif <!-- Fin de la vérification principale -->

</body>
</html>