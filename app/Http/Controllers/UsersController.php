<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create and return a user object
     * @param Illuminate\Http\Request  $request
     * @return User object
     */
    public function create(Request $request)
    {
		$password = $request->input('password');
        $user = new User;
        $user->roleId = $request->input('roleId'); //MamaNguo or a user
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->email = $request->input('email');
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->location = $request->input('location');
        return $user;
    }

    public function storeUser(Request $request)
    {
        $user = $this->create($request);
        $user->isUserRegistered = 1;
        $saved = $user->save();
        $message = $saved ? "Registration successful" : "Something went wrong. Please try again later.";
        return response()->json(['status' => $saved, 'message' => $message, 'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMamaNguo(Request $request)
    {
        $user = $this->create($request);
        $user->idNumber = $request->input('idNumber');
        $user->isUserRegistered = 1;
        $added = $user->save();
        $message = $added ? "Registration successful" : "Something went wrong. Please try again later.";
        return response()->json(['status' => $added, 'message' => $message]);
    }

    /**
     * Display all Users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function getAvailableMamaNguo()
    {
        $mamanguo = DB::table('users')
					->select('firstName','lastName', 'phoneNumber','mamanguoId','rating','status')
                    ->join('ratings', 'users.userId','=','ratings.mamanguoId')
                    ->where('status','=',1)
					->groupBy('users.userId')
                    ->get();
        return response()->json($mamanguo); 
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}