<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersFormRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UsersFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersFormRequest $request)
    {
        //$request = json_decode($request);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response()->json($user, 200); // Não é necessario retornar um json pois o laravel já sabe transformar o retorno em um, porém para tornar mais claro isso é interessante usar essa função
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {   
        $user = User::find($id);
        if($user) {
            return response()->json($user, 201);
        }
        return response()->json(['Não foi possivel encontrar o usuario', 404]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = User::destroy($id);
        if($user) {
            return response()->json(['Usuário deletado com sucesso'], 201);
        }
        return response()->json(['Não foi possivel encontrar o usuario', 404]);
    }
}
