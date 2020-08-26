<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {

        $data = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($data->fails()) {
            return response()->json(['error' => $data->errors()], 401);
        }
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'digital_address' => $request->input('digital_address'),
            'location' => $request->input('location'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json(['message' => 'Success', $newUser->id,
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($data->fails()) {
            return response()->json(['error' => $data->errors()], 401);
        }

        $credentials = $request->only(['email', 'password']);
        if ($token = Auth::attempt($credentials)) {
            // $token = $this->respondWithToken($token);
            $roles = Auth::user()->getRoleNames();

            Auth::user()['accessToken'] = $token;
            Auth::user()['role'] = $roles;
            return response()->json(['user' => Auth::user()]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        return response()->json(Auth()->User());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if (!$user = Auth()->setRequest($request)->user()) 
        { 
            return 'Unauthorized';
        }
        Auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request): Response
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param 
     * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkResponse($response): Response
    {
        return $this->response-array(['message'=>'password reset email sent']);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param
    * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkFailedResponse(Request $request, $response):Response
    {
        return $this->response->errorInternal('Eamil could not be sent to email address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}
