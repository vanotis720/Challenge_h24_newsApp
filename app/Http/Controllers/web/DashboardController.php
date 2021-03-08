<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $articles;
    private $categories;
    
    public function __construct(ArticlesController $articles, CategoriesController $categories) {
        $this->articles = $articles;
        $this->categories = $categories;
    }  
    
    public function home()
    {
        $articles =  $this->articles->index();
        $categories =  $this->categories->index();
        
        return view('home',compact('articles','categories'));
    }
    
    public function lire($id)
    {
        // $articles =  $this->articles->show($id);
        $categories =  $this->categories->index();
        return view('read',compact('categories'));
    }
    
    
}
