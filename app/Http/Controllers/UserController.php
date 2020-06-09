<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        return response()->json([
            'users' =>  $users,
        ]);
    }

    public function store(Request $request ){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'active' => $request->active
        ]);
    }

    public function update(Request $request){
        User::update([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'active' => $request->active
        ]);
    }

    public function destroy(User  $user){
        $user->active = false;
        return back();
    }
}
