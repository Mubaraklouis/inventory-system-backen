<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::latest()->paginate(4);
        return inertia(
            'admin/users/users',
            [
                'users' => $user
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $validated = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' =>$request->is_admin === null ? false :true,
            'is_seller' =>$request->is_seller === null ?false :true

        ];
        $this->authorize('create',$user);
        User::create($validated);
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
    public function editUser(string $id)
    {
        $user = User::find($id);
        return inertia(
            'admin/users/editUser',
            [
                'user' => $user
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, User $user)
    {

        $this->authorize('update', $user);
        $validated = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ];
        DB::table('users')->where('id', $id)->update($validated);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, User $user)
    {
        $this->authorize('delete', $user);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
