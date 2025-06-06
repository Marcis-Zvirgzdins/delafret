<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $this->authorize('create', \App\Models\Article::class);

        return view('create');
    }
}