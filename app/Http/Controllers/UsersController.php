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
    public function addUser(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_usertype =0;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->profile_picture = $request->profile_picture;
        
        $user->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    public function updateUser(Request $request){
        $user=User::where('id_user',$request->id_user)->update(['email'=>$request->email],
        ['password'=>$request->password],['name'=>$request->name],['last_name'=>$request->last_name],
        ['profile_picture'=>$request->profile_picture]);

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
