<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Helpers\Token;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $user = User::by_field('email', $request->email);

        if ($user->password == $request->password)
        {
            $token = new Token(['email' => $user->email]);
            $token = $token->encode();

            return response()->json([
                "token" => $token
            ], 200);
        }

        return response()->json([
            "message" => "unauthorized"
        ], 401);
    }

    public function lend(Request $request)
    {
        $user = User::find($request->user_id);
        $book = Book::find($request->book_id);
        $user->books()->attach($book);
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
