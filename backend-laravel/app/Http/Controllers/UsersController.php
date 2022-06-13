<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersFormRequest;
use Illuminate\Support\Facades\Auth;
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
        return User::all(); // Não é necessario retornar um json pois o laravel já sabe transformar o retorno em um, porém para tornar mais claro isso é interessante usar essa função
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
        Auth::login($user);
        $user = Auth::user();
        $token = $user->createToken('token');
        return response()->json(/*$user*/$token->plainTextToken, 200); // Não é necessario retornar um json pois o laravel já sabe transformar o retorno em um, porém para tornar mais claro isso é interessante usar essa função
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
        return response()->json(['message' => 'Não foi possível encontrar o usuário'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UsersFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersFormRequest $request, int $id)
    {
        $user = User::find($id);
        if($user) {
            $user->update($request->all());
            $user->save();
            return response()->json($user);
        }
        return response()->json(['message' => 'Não foi possível encontrar o usuário'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(User::destroy($id)) {
            return response()->json(['message' => 'Usuário deletado com sucesso'], 201);
        }
        return response()->json(['message' => 'Não foi possível encontrar o usuário'], 404);
    }
}
