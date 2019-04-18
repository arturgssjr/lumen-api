<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show all Users
     *
     * @return User $users
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Show a specific user
     *
     * @param mixed $id
     * @return User $user
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->saveOrFail();

        return response()->json($user);
    }

}
