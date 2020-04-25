<?php

namespace App\Http\Controllers;

use App\Mampara;
use Illuminate\Http\Request;


class MamparaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mamparasDucha = Mampara::where('duchaBañera', 0)->paginate(3, ['*'], 'p1');
        $mamparasBañera = Mampara::where('duchaBañera', 1)->paginate(3, ['*'], 'p2');
        return view('index', [
            'mamparasDucha' => $mamparasDucha,
            'mamparasBañera' => $mamparasBañera
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mamparas = new Mampara();

        $mamparas->nombre = request("nombre");
        $mamparas->tipoCristal = request("tipo");
        $mamparas->perfil = request("perfil");
        $mamparas->color = request("color");
        $mamparas->duchaBañera = request("tema");
        $mamparas->estimacionPrecio = request("precio");

        $mamparas->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mampara = Mampara::find($id);

        return view('mamparaDetalle',['mampara' => $mampara]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function edit(Mampara $mampara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mampara $mampara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mampara $mampara)
    {
        //
    }

    public function filtro($tipo)
    {
        if ($tipo == 'bañera'){
            $mamparas = Mampara::where('duchaBañera', 1)->paginate(5);
            return view('filtroLateral', [
                'mamparas' => $mamparas,
                'titulo' => 'Bañeras'
            ]);
        }elseif ($tipo == 'todo'){
            $mamparas = Mampara::paginate(5);
            return view('filtroLateral', [
                'mamparas' => $mamparas,
                'titulo' => 'Todas las mamparas'
            ]);
        }elseif ($tipo == 'ducha'){
            $mamparas = Mampara::where('duchaBañera', 0)->paginate(5);
            return view('filtroLateral', [
                'mamparas' => $mamparas,
                'titulo' => 'Duchas'
            ]);
        }
    }
}
