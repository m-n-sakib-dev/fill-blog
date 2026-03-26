<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Inertia\Inertia;

class UserBlogController extends Controller
{
    public function show(string $sub_domain)
    {
        $user = User::where('sub_domain', $sub_domain)
            ->firstOrFail();

        $articles = $user->articles()
            ->with('category')
            ->latest()
            ->paginate(9);

        return Inertia::render('UserBlog', [
            'author'   => [
                'name'       => $user->name,
                'username'   => $user->username,
                'sub_domain' => $user->sub_domain,
            ],
            'articles' => $articles,
        ]);
    }

    public function article(string $sub_domain, int $id)
    {
        $user = User::where('sub_domain', $sub_domain)->firstOrFail();

        $article = Article::where('id', $id)
            ->where('user_id', $user->id)
            ->with('category')
            ->firstOrFail();

        return Inertia::render('ArticleShow', [
            'author'  => [
                'name'       => $user->name,
                'username'   => $user->username,
                'sub_domain' => $user->sub_domain,
            ],
            'article' => $article,
        ]);
    }
}
