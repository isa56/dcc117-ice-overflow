<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCommentFormRequest;
use App\Models\Post;
use App\Models\PostsComment;
use App\Models\UserCommentsReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comments = PostsComment::all();
        foreach($comments as $key => $comment) {
            $comments[$key]->author_name = $comment->user()->get('name')[$key]['name'];
        }
        return $comments;
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
        $data['user_id'] = Auth::user()->id;
        $post = Post::find($data['post_id']);
        $post->comentarios++;
        $post->save();
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
        $comment = PostsComment::find($id);
        if($comment && (Auth::user()->id == $comment->user_id || Auth::user()->admin)) {
            $post = Post::find($comment->post_id);
            $post->comentarios--;
            $post->save();
            if($comment->bestAnswer) {
                $post->finished = false;
            }
            $comment->destroy($id);
            return response()->json(['message' => 'Comentario deletado com sucesso'], 202);
        }
        return response()->json(['message' => 'Erro ao deletar o comentario'], 404);
    }

    /**
     * "Like" a comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vote(int $id) 
    {
        $comment = PostsComment::find($id);
        if(!$comment) {
            return response()->json(['message' => 'Ocorreu um erro ao votar'], 404);
        }
        $user = Auth::user();
        if(!UserCommentsReaction::whereUser_id($user->id)->whereComment_id($comment->id)->first()) {
            UserCommentsReaction::create([
                'user_id' => $user->id,
                'comment_id' => $comment->id,
            ]);
            $comment->vote++;
            $comment->save();
            return response()->json($comment, 202);
        };
        UserCommentsReaction::whereUser_id($user->id)->whereComment_id($comment->id)->delete();
        $comment->vote--;
        $comment->save();
        return response()->json($comment, 202);
    }

    /**
     * Define the best answer.
     * @param int id
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function bestAnswer(int $id, Request $request) 
    {
        if(!$request->has('post_id') && !empty($request->post_id)) {
            return response()->json(["message" => "Erro ao marcar a resposta"], 404);
        }
        $post = Post::find($request->post_id);
        $comment = PostsComment::whereId($id)->wherePost_id($request->post_id)->first();
        if(!$post || !$comment) {
            return response()->json(["message" => "Erro ao marcar a resposta"], 404);
        }
        if(Auth::user()->id != $post->user_id) {
            return response()->json(["message" => "Erro ao marcar a resposta"], 404);
        }
        $comment->best_answer = !$comment->best_answer;
        $post->finished = !$post->finished;
        $comment->save();
        $post->save();

        return response()->json(["message" => "Resposta marcada com sucesso"], 202);
    }
}
