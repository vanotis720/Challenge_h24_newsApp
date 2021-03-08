<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    private $comments;
    
    // public function __construct(CommentsController $comments) {
    //     $this->comments = $comments;
    // }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Articles::select('articles.id','articles.title','articles.content','articles.created_at','articles.picture','categories.title as categorie','users.username','users.email')
                                ->join('categories','categories.id','articles.categories_id')
                                ->join('users','users.id','articles.users_id')
                                ->orderBy('articles.created_at','DESC')
                                ->get();
    }
    
    public function articleByCategorie($categories_id)
    {
        return Articles::select('articles.id','articles.title','articles.content','articles.created_at','articles.picture','categories.title as categorie','users.username','users.email')
                                ->join('categories','categories.id','articles.categories_id')
                                ->join('users','users.id','articles.users_id')
                                ->where('articles.categories_id', $categories_id)
                                ->orderBy('articles.created_at','DESC')
                                ->get();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'picture' => 'required|file',
            'categories_id' => 'required',
            'users_id' => 'required'
        ]);

        $validatedData['picture'] = Storage::disk('public')->put('articles', $request->file('picture'));
        $articles = Articles::create($validatedData);

        return redirect('/')->with('msg','Votre article a ete publier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        $articles = Articles::select('articles.id','articles.title','articles.content','articles.created_at','articles.picture','categories.title as categorie','users.username','users.email')
                                ->join('categories','categories.id','articles.categories_id')
                                ->join('users','users.id','articles.users_id')
                                ->where('articles.id', $article_id)
                                ->orderBy('articles.created_at','DESC')
                                ->first();
        
        // $commentaires = $this->comments->index($article_id);
                                
        return $articles;
    }
}
