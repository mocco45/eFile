<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('pages.manage-user', ['users' => $user]);
    }

    public function store(){
        return view('pages.register');
    }

    public function edit(User $user, Request $request){
        $data = $request->all();
        dd($data);
        $user->update($data);
        return redirect()->back();
    }

    public function profile($user, Request $request){
        dd($user);
        if($request->hasFile('photo')){
            $img = $request->file('photo');
            $name = $img->getClientOriginalName();
            $destination = public_path('img/profile');
            $img->move($destination, $name);
             $user->update(['photo' => $name]);
        }
        else{
            return 'error';
        }

        return redirect()->back();
       
    }
}