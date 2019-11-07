<?php
namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginSignUpController extends Controller {

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'string|email|unique:users',
            'phoneNumber' => 'required|digits:10',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' =>$request->phoneNumber,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 200);
    }


    public function login(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|digits:10',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['phoneNumber', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('k2PqZ9s1kBrbZdQjIDQg6UHCQMmIowi8Eollc0JK');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}