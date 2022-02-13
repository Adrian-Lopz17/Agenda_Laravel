<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = auth()->user()->personas();
        return view('dashboardPersonas', compact('personas'));
    }

    public function añadir()
    {
        return view('añadirPersona');
    }

    public function crear(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'estrella',
            'categoria_id' => 'required'
        ]);

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->telefono = $request->telefono;
        if (!$request->estrella) $persona->estrella = 0;
        else                     $persona->estrella = 1;
        $persona->categoria_id = $request->categoria_id;
        $persona->user_id = auth()->user()->id;

        $persona->save();
        return redirect('/dashboardPersonas');
    }

    public function editar(Persona $persona)
    {

        if (auth()->user()->id == $persona->user_id) {
            return view('editarPersona', compact('persona'));
        } else {
            return redirect('/dashboardPersonas');
        }
    }

    public function actualizar(Request $request, Persona $persona)
    {
        if (isset($_POST['eliminar'])) {
            $persona->delete();
            return redirect('/dashboardPersonas');
        } elseif (isset($_POST['clickEstrella'])) {
            if ($persona->estrella)  $persona->estrella = 0;
            else                     $persona->estrella = 1;
            $persona->save();

            return redirect('/dashboardPersonas');
        } else {
            $this->validate($request, [
                'nombre' => 'required',
                'apellidos' => 'required',
                'telefono' => 'required',
                'estrella',
                'categoria_id' => 'required'
            ]);
            $persona->nombre = $request->nombre;
            $persona->apellidos = $request->apellidos;
            $persona->telefono = $request->telefono;
            if (!$request->estrella) $persona->estrella = 0;
            else                     $persona->estrella = 1;
            $persona->categoria_id = $request->categoria_id;
            $persona->save();

            return redirect('/dashboardPersonas');
        }
    }
}
