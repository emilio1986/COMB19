<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$resultado = Comentario::paginate(5);
        $resultado = \ DB::table('comentarios')->select('comentarios.*')->where('autor','=' ,Auth::user()->name)->paginate(5);

        return view('entidades.comentarios.listar')->with('resultado', $resultado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        if (Auth::user()->comproPasaje) {

            return view('entidades.comentarios.alta');
        }
        else return redirect()->to(RouteServiceProvider::HOME)->with('usuarioSinPasaje', 'open');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:255|',

        ]);



        $producto = Comentario::create([

            'contenido' => $request->contenido,
            'user_id' => $request->user_id,
            'autor' => $request->user()->name

        ]);

        return redirect()->to(route('comentario.create'))->with('popup', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        return view('entidades.comentarios.info', ['comentario' => $comentario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        return view('entidades.comentarios.editar', ['comentario' => $comentario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        $request["contenido"] = ($request->contenido);

        $request->validate([
            'contenido' => 'required|string|max:255|',

        ]);

        $comentario->update($request->all());
        return redirect()->to(route('comentario.info', ['comentario' => $comentario->id]))->with('comentariomodificado', 'open');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->to(route('comentario.index'))->with('comentarioeliminado', $comentario);
    }
}
