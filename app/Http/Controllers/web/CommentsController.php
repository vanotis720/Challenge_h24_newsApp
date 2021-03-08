<?php

namespace App\Http\Controllers\web;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($articles_id)
    {
       return Comments::select('comments.id','comments.comment','comments.users_id','users.username','comments.created_at')
                        ->where('comments.articles_id', $articles_id)
                        ->join('users','users.id','comments.users_id')
                        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'articles_id' => 'required',
            'users_id' => 'required'
        ]);

        $validatedData = $request->all();

        $comment = Comments::create($validatedData);

        return redirect()->back()->withMessage('Votre commentaire a ete poster');
    }

}
