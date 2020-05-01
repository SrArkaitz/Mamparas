<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $pregunta = new Pregunta();

        $pregunta->textoPreg = request('pregunta');
        $pregunta->mampara_id = $id;

        if ($request->hasFile('adjunto') && $request->file('adjunto')->isValid()) {
            $adj = $request->file('adjunto');
            $input['attachFileName'] = 'adjunto' . time() . '.' . $adj->getClientOriginalExtension();
            $destinationPath = public_path('/adjuntos');
            $adj->move($destinationPath, $input['attachFileName']);
            $pregunta->adjunto = $input['attachFileName'];
        }
        $pregunta->save();

        return redirect()->route('detalleMampara', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta = Pregunta::find($id);


        //Storage::download('public/adjuntos/'.$respuesta->adjunto);
        //return redirect('anuncio.detalle', $respuesta->pregunta_id);
        return  response()->download(public_path('adjuntos/'.$pregunta->adjunto));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);

        $mamparaId = $pregunta->mampara_id;

        if (isset($pregunta->respuesta)){
            $pregunta->respuesta->delete();
        }
        $pregunta->delete();
        return redirect()->route('detalleMampara', $mamparaId);
    }
}
