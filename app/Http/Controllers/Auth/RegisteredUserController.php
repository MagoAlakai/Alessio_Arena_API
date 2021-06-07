<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//JWT
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // forcing a response for now - change this later to actually register a user
        
        // return response()->json( [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ], 201 );

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        //     'password_confirmation' => 'required|string|required_with:password|same:password|min:8',
        // ]);

        $servername = "alessio-arena-db";
        $username = "root";
        $password = "xz32NNgr45!";
        
        try {
          $conn = new PDO("mysql:host=$servername;dbname=jwt", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return response()->json( "Connected successfully", 200 );
        } catch(PDOException $e) {
            return response()->json( $e->getMessage(), 200 );
        }

    //     try  {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    // } catch( Exception $ex ) {
    //     return response()->json( $ex, 200 );
    // }


        // if ( $user === null ) {
        //     return response()->json([
        //         "error" => 'User not created'
        //     ], 422 );
        // }

        return response()->json( "empty" , 200 );
        

        // else{
            // event(new Registered($user));

            // Auth::login($user);

            // $token = JWTAuth::fromUser($user);

            // return response()->json(compact('user','token'),201);
        // }

        
        //return response()->json(compact('token'),201);
    }
}
