<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $config=['table'=>'users','length'=>10,'prefix'=>'GM-', 'field' => 'member_id'];
        $id = IdGenerator::generate($config);

        DB::table('users')->insert(
            ['member_id' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password),'created_at' => now(), 'updated_at' => now()]
        );



        //  $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'member_id' => $id,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // Auth::login([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'member_id' => $id,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
