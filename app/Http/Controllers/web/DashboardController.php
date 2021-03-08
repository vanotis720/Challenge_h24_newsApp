<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $articles;
    private $categories;
    private $comments;
    
    public function __construct(ArticlesController $articles, CategoriesController $categories, CommentsController $comments) {
        $this->articles = $articles;
        $this->categories = $categories;
        $this->comments = $comments;
    }  
    
    public function home()
    {
        $articles =  $this->articles->index();
        $categories =  $this->categories->index();
        
        return view('home',compact('articles','categories'));
    }
    
    public function lire($id)
    {
        $article =  $this->articles->show($id);
        
        $categories =  $this->categories->index();
        
        $commentaires =  $this->comments->index($id);
        
        return view('read',compact('categories','article','commentaires'));
    }
    
    public function articleByCategorie($categories_id)
    {
        $articles =  $this->articles->articleByCategorie($categories_id);
        
        $categories =  $this->categories->index();
        
        $this_categorie =  $this->categories->show($categories_id);

        return view('categories',compact('categories','articles','this_categorie'));
    }
    
    public function form_article()
    {
        $categories =  $this->categories->index();
        $catego =  $this->categories->index();
        
        return view('article',compact('categories','catego'));
    }
}