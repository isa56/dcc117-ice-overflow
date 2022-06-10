<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
            return response()->json($post, 202);
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
        if(Post::destroy($id)) {
            return response()->json(['message' => 'Post deletado com sucesso'], 202);
        }
        return response()->json(['message' => 'Não foi possível encontrar o post'], 404);
    }
}
