<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Token;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

    public function register(Request $request)
    {
        $user = new Self();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public static function by_field($key, $value)
    {
        $users = self::where($key, $value)->get();

        foreach ($users as $key => $user)
        {
            return $user;
        }
    }

    public function is_authorized(Request $request)
    {
        $token = new Token();
        $header_authorization = $request->header('Authorization');

        if (!isset($header_authorization))
        {
            return false;
        }

        $data = $token->decode($header_authorization);
        return !empty(self::by_field('email', $data->email));
    }
}
