<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;


class ArticlesController extends ApiController
{
    private $comments;
    
    public function __construct(CommentsController $comments) {
        $this->comments = $comments;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::select('articles.id','articles.title','articles.content','articles.created_at','articles.picture','categories.title as categorie','users.username','users.email')
                                ->join('categories','categories.id','articles.categories_id')
                                ->join('users','users.id','articles.users_id')
                                ->orderBy('articles.created_at','DESC')
                                ->get();
                                
        return $this->successResponse($articles);
    }
    
    public function articleByCategorie($categories_id)
    {
        $articles = Articles::select('articles.id','articles.title','articles.content','articles.created_at','articles.picture','categories.title as categorie','users.username','users.email')
                                ->join('categories','categories.id','articles.categories_id')
                                ->join('users','users.id','articles.users_id')
                                ->where('articles.categories_id', $categories_id)
                                ->orderBy('articles.created_at','DESC')
                                ->get();
                                
        return $this->successResponse($articles);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'picture' => 'required|file',
            'categories_id' => 'required',
            'users_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }
        $validatedData = $request->all();

        $validatedData['picture'] = Storage::disk('public')->put('articles', $request->file('picture'));
        $articles = Articles::create($validatedData);

        return $this->successResponse($articles);
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
        
        $commentaires = $this->comments->index($article_id);
                                
        return $this->successResponse(['articles' => $articles , 'comments' => $commentaires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }
}
