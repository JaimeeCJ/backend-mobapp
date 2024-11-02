<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @OA\Info(title="API Mobapp", version="1.0")
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"abroba"},
     *     summary="Retorna abroba",
     *     @OA\Response(response="200", description="Successful response")
     * )
     */
    public function index(){
        //$users = User::all();
        //return UserResource::collection($users) 
        return "abroba";
    }
}

