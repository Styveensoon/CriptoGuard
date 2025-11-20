<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


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
        'birthdate' => 'required|date_format:d/m/Y',
        'sex' => 'required|in:male,female,other',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|string|min:3|max:20|unique:users,username|regex:/^[a-zA-Z0-9_]+$/',
        'password' => 'required|string|min:8|confirmed',
        'company' => 'nullable|string|max:255',
        'role' => 'nullable|string|max:255',
        'experience' => 'nullable|string|max:255',
        'specialty' => 'nullable|string|max:255',
    ], [
        'birthdate.date_format' => 'La fecha debe estar en formato DD/MM/AAAA.',
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

        //Envia correo de bienvenida
        Mail::to($user->email)->send(new WelcomeMail($user));


        // Iniciar sesión automáticamente
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', '¡Registro completado exitosamente!');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('credentials.login');
    }

    public function login(Request $request)
{
    // Validación flexible
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    // Intento usando email
    $emailCredentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    // Intento usando username
    $usernameCredentials = [
        'username' => $request->email,
        'password' => $request->password
    ];

    // Ejecutar intentos
    if (Auth::attempt($emailCredentials, $request->filled('remember')) ||
        Auth::attempt($usernameCredentials, $request->filled('remember'))) {

        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Usuario, correo o contraseña incorrectos.',
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