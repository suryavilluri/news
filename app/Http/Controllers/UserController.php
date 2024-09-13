<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Validator, Auth, Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()) {
            return redirect('cms/dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // $user = User::where('name', $request->name)->first();

            Session::put('user_id', Auth::user()->id);
            Session::put('username', Auth::user()->name);

            return redirect()->intended('cms/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    public function dashboard()
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
