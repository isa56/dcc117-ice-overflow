<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsFormRequest;
use App\Models\Post;
use App\Models\PostsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPostsReaction;
class PostsController extends Controller
{

    public function __construct(private array $arrayDeMaterias = [])
    {
        $this->arrayDeMaterias = [
            'Modelagem de sistemas', 
            'Calculo 2', 
            'OO'
        ];
    }
    /**
     * Display a listing of the resource.
     * @param App\Http\Requests\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Post::query();
        if($request->has('materia') && !empty($request->materia)) {
            if(!in_array($request->materia, $this->arrayDeMaterias)) {
                return response()->json(['message' => 'Materia invalida'], 401);
            }
            $query->whereMateria($request->materia);
        }  
        return $query->paginate(2);
        //return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostsFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsFormRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        return response()->json(Post::create($data), 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::find($id);
        if($post) {
            $postComment = PostsComment::wherePost_id($post->id)->get();
            return response()->json(['post' => $post, 'postComments' => $postComment], 202);
        }
        return response()->json(['message' => 'Post não encontrado'], 404);
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
        $post = Post::find($id);
        if($post && Auth::user()->id == $post->user_id) {
            Post::destroy($id);
            return response()->json(['message' => 'Post deletado com sucesso'], 202);
        }
        return response()->json(['message' => 'Não foi possível deletar o post'], 404);
    }

    /**
     * like a post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vote(int $id) 
    {
        $post = Post::find($id);
        if(!$post) {
            return response()->json(['message' => 'Não foi possível encontrar o post'], 404);
        }
        $user = Auth::user();
        if(!UserPostsReaction::whereUser_id($user->id)->wherePost_id($post->id)->first()) {
            UserPostsReaction::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
            $post->vote++;
            $post->save();
            return response()->json($post, 202);
        };
        UserPostsReaction::whereUser_id($user->id)->wherePost_id($post->id)->delete();
        $post->vote--;
        $post->save();
        //dd($post->vote);
        return response()->json($post, 202);
    }
}
