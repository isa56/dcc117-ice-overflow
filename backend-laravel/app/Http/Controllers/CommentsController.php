<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCommentFormRequest;
use App\Models\PostsComment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostsComment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostsCommentFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCommentFormRequest $request)
    {
        $data = $request->all();
        return response()->json(PostsComment::create($data), 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = PostsComment::find($id);
        if($comment) 
        {
            return response()->json($comment, 202);
        }        
        return response()->json(['message' => 'Erro ao exibir o comentario'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request, $id)
    {
        //
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(PostsComment::destroy($id)) {
            return response()->json(['message' => 'Comentario deletado com sucesso'], 202);
        }
        return response()->json(['message' => 'Erro ao deletar o comentario'], 404);
    }
}
