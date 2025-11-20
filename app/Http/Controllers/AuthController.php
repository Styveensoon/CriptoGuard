<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showSignup()
    {
        return view('credentials.signup');
    }

    // Procesar registro
    public function signup(Request $request)
    {
        // Convertir fecha de formato d/m/Y a Y-m-d
        $birthdate = null;
        if ($request->birthdate) {
            $parts = explode('/', $request->birthdate);
            if (count($parts) === 3) {
                $birthdate = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
            }
        }

        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'paterno' => 'required|string|min:2|max:255',
            'materno' => 'required|string|min:2|max:255',
            'birthdate' => 'required|date',
            'sex' => 'required|in:male,female,other',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|min:3|max:20|unique:users,username|regex:/^[a-zA-Z0-9_]+$/',
            'password' => 'required|string|min:8|confirmed',
            'company' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'specialty' => 'nullable|string|max:255',
        ], [
            'username.regex' => 'El nombre de usuario solo puede contener letras, números y guiones bajos.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Validar edad manualmente
        if ($birthdate) {
            $birthDate = new \DateTime($birthdate);
            $today = new \DateTime();
            $age = $today->diff($birthDate)->y;
            
            if ($age < 18) {
                $validator->errors()->add('birthdate', 'Debes tener al menos 18 años para registrarte.');
            }
        }

        if ($validator->fails()) {
            return redirect()->route('signup')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'birthdate' => $birthdate,
            'sex' => $request->sex,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'company' => $request->company,
            'role' => $request->role,
            'experience' => $request->experience,
            'specialty' => $request->specialty,
        ]);

        // Iniciar sesión automáticamente
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', '¡Registro completado exitosamente!');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('credentials.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar login con email
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // Si falla con email, intentar con username
        $usernameCredentials = [
            'username' => $request->email, // El usuario podría estar ingresando su username en el campo email
            'password' => $request->password
        ];

        if (Auth::attempt($usernameCredentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ])->onlyInput('email');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}