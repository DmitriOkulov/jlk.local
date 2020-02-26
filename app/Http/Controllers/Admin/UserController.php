<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $register;

    public function __construct()
    {
        $this->middleware('can:admin-panel');
    }

    public function index(Request $request)
    {
        $query = User::orderBy('id', 'asc');
        $users = $query->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (User::where('email', $request['email'])->first()) {
            return back()->withErrors(['error' => 'Пользователь существует']);
        }
        $user = User::new(
            $request['email'],
            $request['password'],
            'user'
        );

        $user->save();

        return redirect()->route('users_admin.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        if ($request['password']) {
            $user->update($request->only(['password']));
        }
        return redirect()->route('users_admin.show', $user)->with('status', 'Информация изменена');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

}