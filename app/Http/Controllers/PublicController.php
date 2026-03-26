<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function authors()
    {
        /*
         * withCount('articles')
         *   → SQL: SELECT users.*, COUNT(articles.id) AS articles_count FROM users
         *           LEFT JOIN articles ON articles.user_id = users.id GROUP BY users.id
         *   → প্রতিটা User model-এ $user->articles_count property পাওয়া যায়
         *
         * has('articles')
         *   → SQL: WHERE EXISTS (SELECT 1 FROM articles WHERE articles.user_id = users.id)
         *   → যাদের কোনো article নেই তাদের বাদ দেয়
         *
         * orderByDesc('articles_count')
         *   → সবচেয়ে বেশি article আছে যার সে আগে আসবে
         */
        $authors = User::withCount('articles')
            ->has('articles')
            ->orderByDesc('articles_count')
            ->get();

        return Inertia::render('Authors', [
            'authors' => $authors,
        ]);
    }

    public function articles()
    {
        /*
         * with(['user', 'category'])
         *   → Eager loading: articles আনার সাথে সাথে related user ও category
         *      একটি query-তে আনে (N+1 problem avoid করে)
         *
         * latest()
         *   → orderBy('created_at', 'desc') এর shorthand
         *
         * paginate(12)
         *   → SQL: LIMIT 12 OFFSET (page-1)*12
         *   → Laravel automatically ?page=2 query string handle করে
         */
        $articles = Article::with(['user', 'category'])
            ->latest()
            ->paginate(12);

        return Inertia::render('Articles', [
            'articles' => $articles,
        ]);
    }
}
