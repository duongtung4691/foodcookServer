<?php
namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
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
            'password' => bcrypt($request->password),
            'idType' => 5
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
        $tokenResult = $user->createToken('phoneNumber');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addMonth();
        $token->save();
        return response()->json([
            'user' => [
                'id' => $request->user()->id,
                'type' => $request->user()->idType,
                'phoneNumber' => $request->user()->phoneNumber,
                'email' => $request->user()->email,
            ],
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
     * @param Request $request
     * @return JsonResponse [json] user object
     */
    public function user(Request $request){
        return response()->json([
            'id' => $request->user()->id,
            'type' => $request->user()->idType,
            'phoneNumber' => $request->user()->phoneNumber,
            'email' => $request->user()->email,
        ]);
    }
}
