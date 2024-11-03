<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
/**
 * @OA\Info(title="API Mobapp", version="1.0")
 */
class UserController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"Usuários"},
     *     summary="Retorna todos os usuários",
     *     description="Este endpoint retorna uma lista de todos os usuários cadastrados na plataforma. É possível filtrar os resultados utilizando parâmetros de consulta.",
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com a lista de usuários.",     
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor."
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     tags={"Usuários"},
     *     summary="Retorna um usuário específico",
     *     description="Este endpoint retorna os detalhes de um usuário específico pelo ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do usuário que deseja recuperar."
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com os dados do usuário."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado."
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor."
     *     )
     * )
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users); 
    }

    public function show($id_user)
    {
        $user = User::findOrFail($id_user);
        return new UserResource($user);
    }
}

