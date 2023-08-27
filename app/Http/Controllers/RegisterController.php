<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $validator = Validator::make($attributes,[
            'firstName' => 'required|max:255|min:2',
            'lastName' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'phone' => 'required|size:10',
            'photo' => 'required|mimes:jpg,png,jpeg'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();

            // Loop through each item in the array and retrieve errors
            foreach ($errors->all() as $error) {
                // Handle the error (e.g., log it or display it)
                echo $error . '<br>';
            }
        }
        else{

            
            
            if($request->hasFile('photo')){
                $img = $request->file('photo');
                $name = $img->getClientOriginalName();
                $destination = public_path('img/profile');
                $img->move($destination, $name);
                User::create([
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'photo' => $name,
                ]);
            }
                
            return response()->json(['message' => 'Data submitted successfully']);
        }

        
    }

    public function destroy(User $user){

        $user->delete();

        return redirect()->back();
    }
}
