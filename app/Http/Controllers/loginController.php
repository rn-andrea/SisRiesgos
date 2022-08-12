<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
   public function verificar(Request $request)
   {

   $credenciales = request()->validate([
    'email'=>['required','email','string'],
    'password'=>['required','string']
]);
    $correo = $request->get('email');
   $consulta = DB::table('usuarios')->select('ind_estado')->where('usr_email',$correo)->value('ind_estado');

    if(Auth::attempt($credenciales) && $consulta=='1')
    {
        request()->session()->regenerate();

        return redirect()->intended('/PanelPrincipal');

    }
        throw ValidationException::withMessages(
        [
            'email'=>__('auth.failed')
        ]);

   }

   public function cerrar()
   {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/InicioSesion');
   }

}
