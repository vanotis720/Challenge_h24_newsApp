<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiController;

class CommentsController extends ApiController
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|',
            'articles_id' => 'required',
            'users_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }
        $validatedData = $request->all();

        $comment = Comments::create($validatedData);

        return $this->successResponse($comment);
    }

}
