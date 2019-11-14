<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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
}
