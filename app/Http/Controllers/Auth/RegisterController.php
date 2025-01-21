<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'], // Añadir otras reglas si es necesario
        ]);

        // Crear el usuario
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->ci = $request->input('ci'); // Asegúrate de que este campo se valida si lo usas
        $user->rol = 'super_usuario'; // O el rol que necesites
        $user->password = bcrypt($validatedData['password']); // Encriptar la contraseña
        $user->save();

        // Retornar una respuesta
        return response()->json(['message' => 'Usuario registrado con éxito.'], 201);
    }
}
