<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cache;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth:sanctum', ['except' => ['login']]);
//    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($credentials)) {
            if ($request->user()->tokens) {
                $request->user()->tokens()->delete();
            }
            $token = $request->user()->createToken($request->user()->username . "-" . "access");
            return $this->respondWithToken($token, $request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {

        $user = User::find(Auth::user()->id);

        return response()->successJson($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
//        if (!auth()->user()->tokenCan('admin-access')){
//            abort(403, 'Unauthorized');
//        }
//        Auth::logout();
//
        if (auth()->user())
        {
            auth()->user()->tokens()->delete();
        } else {
            return [
                'message' => 'Token not find'
            ];
        }

        return [
            'message' => 'Logged out'
        ];
//        return response()->successJson(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $request = null)
    {
        return response()->json([
            'access_token' => $token->plainTextToken,
            'user' => $request->user(),
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL() * 36000
        ]);
    }
}
