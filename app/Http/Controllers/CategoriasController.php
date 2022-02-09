<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = auth()->user()->categorias();
        return view('dashboardCategorias', compact('categorias'));
    }

    public function añadir()
    {
        return view('añadirCategoria');
    }

    public function crear(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required'
        ]);
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->user_id = auth()->user()->id;

        $categoria->save();
        return redirect('/dashboardCategorias');
    }

    public function editar(Categoria $categoria)
    {

        if (auth()->user()->id == $categoria->user_id) {
            return view('editarCategoria', compact('categoria'));
        } else {
            return redirect('/dashboardCategorias');
        }
    }

    public function actualizar(Request $request, Categoria $categoria)
    {
        if (isset($_POST['eliminar'])) {
            $categoria->delete();
            return redirect('/dashboardCategorias');
        } else {
            $this->validate($request, [
                'nombre' => 'required'
            ]);
            $categoria->nombre = $request->nombre;
            $categoria->save();
            return redirect('/dashboardCategorias');
        }
    }
}
