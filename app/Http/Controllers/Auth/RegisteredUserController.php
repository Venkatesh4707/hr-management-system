<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Department;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . Employee::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $branch = Branch::factory()->create();
        $department = Department::factory()->create();
        
        $user = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'phone' => '9999999999',
            'address' => 'Test Address',
            'national_id' => rand(1000000000000,9999999999999),

            'branch_id' => $branch->id,
            'department_id' => $department->id,

            'hired_on' => now()->format('Y-m-d'),
            'is_remote' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
