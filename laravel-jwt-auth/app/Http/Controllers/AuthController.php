<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (!$token = auth()->attempt($validator->validated())) {
            $addAttempt = User::where('email', $request->email)->find(1);
            if (date('H') < $addAttempt->heure && $addAttempt->heure != null) {
                Log::debug($addAttempt . 'Cet utilisateur a essayé de se connecté trop de fois');
                Log::channel('syslog')->debug($addAttempt . 'Cet utilisateur a essayé de se connecté trop de fois');
                Mail::to($request->email)->send(new Contact([
                    'email' => $request->email,
                ]));
                return response()->json(['error' => 'Vous avez effectué trop de tentative recemment, veuillez attendre 2h'], 401);
                
            } else {
                $addAttempt->heure = null;
                $addAttempt->save();
            }
            $addAttempt->attempt = $addAttempt->attempt + 1;
            $addAttempt->save();
            if ($addAttempt->attempt > 3) {
                $addAttempt->attempt = 0;
                $addAttempt->heure = date('H') + 2;
                $addAttempt->save();
                return response()->json(['error' => 'Vous avez effectué trop de tentative recemment, veuillez attendre 2h'], 401);
            }
            return response()->json(['error' => 'nombre de tentative' . $addAttempt->attempt], 401);
        } else {
            $addAttempt = User::where('email', $request->email)->find(1);
            if ($addAttempt->heure == null) {
                return $this->createNewToken($token);
            } else {
                return response()->json(['error' => 'Vous avez effectué trop de tentative recemment, veuillez attendre 2h'], 401);
            }
        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
