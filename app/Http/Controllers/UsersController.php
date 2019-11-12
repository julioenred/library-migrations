<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers\Token;

class UsersController extends Controller
{
    private $key = "`qo3ieh4gnopiewh89wnrti9ugnfiopearjsfp982857yuiotugweng4iuwo5";

    public function login(Request $request)
    {
        // Buscar el usuario por email
        // Comprobar que user de requste y email y password de user son iguales
        // si son iguales tengo que codificar el token
        // después devolver la respuesta json con el token y un codigo 200
        // si no son iguales devolver la respuesta json con codigo 401
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->register($request);

        $data_token = [
            "email" => $user->email,
        ];

        $token = new Token($data_token);
        $token = $token->encode();

        return response()->json([
            "token" => $token
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
