<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::latest()->paginate(4);
       return inertia('admin/users/users',
    [
        'users' =>$user
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       User::create($request->all());
       return redirect()->route('users.index');
    }

    /**
     * Display the form for user.
     */
    public function create()
    {
     return inertia('admin/users/userForm');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
  $user = User::find($id);
  $user->delete();
  return redirect()->route('users.index');
    }
}
