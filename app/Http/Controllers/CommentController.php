<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $request->validate(['content' => 'required']);

        Comment::create([
            'content' => $request->content,
            'article_id' => $articleId,
            'user_id' => auth()->id() // On récupère l'ID de l'utilisateur connecté !
        ]);

        return back(); // On recharge la page
    }
}