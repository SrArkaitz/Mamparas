<?php

namespace App\Http\Controllers;

use App\Mampara;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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
    public function edit($id)
    {
        $mampara = Mampara::find($id);

        return view('editarMampara', [
            'mampara' => $mampara,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $mampara = Mampara::find($id);

        $mampara->nombre = request('nombre');
        $mampara->color = request('color');
        $mampara->estimacionPrecio = request('precio');
        $mampara->tipoCristal = request('tipo');
        $mampara->perfil = request('perfil');
        $mampara->duchaBañera = request('duchaBañera');

        $mampara->save();

        return redirect()->route('detalleMampara', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mampara  $mampara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mampara = Mampara::find($id);

        if (count($mampara->pregunta) != 0){
            foreach ($mampara->pregunta as $preg){
                if (isset($preg->respuesta)){
                    $preg->respuesta->delete();
                }
                $preg->delete();
            }
        }

        $mampara->delete();

        return redirect()->route('index');
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

    public function filtradoArriba(){
        $nombre = request('nombreFiltro');
        $tema = request('temaFiltro');

        if ($tema == "tema"){
            $mamparas = Mampara::where('nombre', 'LIKE', '%'.$nombre.'%')->paginate(5);
            return view('filtroArriba',['mamparas' => $mamparas]);
        }elseif ($tema == "ducha"){
            $mamparas = Mampara::where('nombre', 'LIKE', '%'.$nombre.'%')->where('duchaBañera', 0)->paginate(5);
            return view('filtroArriba',['mamparas' => $mamparas]);
        }elseif ($tema == "bañera"){
            $mamparas = Mampara::where('nombre', 'LIKE', '%'.$nombre.'%')->where('duchaBañera', 1)->paginate(5);
            return view('filtroArriba',['mamparas' => $mamparas]);
        }

    }

    public function contactarEmpresa(){


        $nombre = request('nombre');
        $apellido = request('apellido');
        $telefono = request('telefono');
        $mensaje = request('mensaje');
        $email = request('email');
        $id = request('id');

        $mampara = Mampara::find($id);

        $mail = new PHPMailer();
        $mail->isSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML(true);
        $mail->Username = 'samplusku@gmail.com';
        $mail->Password = '12345Abcde';
        $mail->SetFrom('samplusku@gmail.com');
        $mail->Subject = 'Mampara '. $mampara->nombre . " tiene un interesado";
        $mail->Body = 'La mampara con el nombre: '.$mampara->nombre . ' tiene un interesado.<br><a href=\"homestead.test/mampara/$id\">Pincha aquí para ir a ver la mampara.</a><br>La persona en contactarte se llama $nombre $apellido. Su número de teléfono es: $telefono y el email: $email.<br>El mensaje enviado fue este:<br>'.$mensaje;
        $mail->AddAddress('aarrkaiitz@gmail.com');
        $mail->Send();
        return $mampara->id;

    }
}
