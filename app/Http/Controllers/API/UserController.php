<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name),
        ]);
        $user->save();
        return response()->json(['message' => 'user has been created successfully...', $user]);
    }
    public function login(Request $request)
    {
         $request->validate([
            'email' => 'required',
            'password' => 'required|string'
        ]);

        $credentials=request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message'=>'unauthorized'
            ],401);
        }

        // $user = User::where('email', $data['email'])->first();

        // if (!$user || !Hash::check($data['password'], $user->password)) {
        //     return response()->json(['incorrect email or password']);
        // }

        $user=$request->user();
        $tokenResult=$user->createToken('Personal Access Token');
        $token=$tokenResult->tokens();
        if($request->remember_me){
            $token->expires_at=Carbon::now()->addWeeks(4);
        }

        $token->save();

        return response()->json([
            'access_token'=>$tokenResult->accessToken,
            'token_type'=>'Bearer',
            'expires_at'=>Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);


        // $apiToken = $user->createToken('apiToken')->plainTextToken;
        // $res = [
        //     'user' => $user,
        //     'token' => $apiToken
        // ];

        // // return response()->json($user);
        // return response($res);
        // // return response()->json([$$res, 'status' => 'successfully loged in']);
    }


    public function logout(Request $request)
    {
        // if($request->user()){
        //     $request->user()->tokens()->delete();
        // }
            $request->user()->tokens()->revoke();
// return response()
        return [
            'message' => 'your are logout'
        ];
    }

    // public function logout(){

    // }


}
