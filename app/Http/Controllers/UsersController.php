<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function login (Request $request){
        $user=new User;
        $user=User::where('email','=',$request->email)->where('password','=',$request->password)->get();
        $userCount=$user->count();
        $userid=$user[0]->id_user;
        $username=$user[0]->name;
        $usertype=$user[0]->id_usertype;
 
        if ($userCount=1){
            return response()->json([
                "status" => "Success",
                "userid" => $userid,
                "username" => $username,
                "usertype" => $usertype
            ], 200);
            
        }

    }
}
