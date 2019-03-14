<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;
use App\Mail\RecordatorioServicio;
use Illuminate\Support\Facades\Mail;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::orderBy('vencimiento')->get();

        return view('gastos.index', compact('gastos'));
    }

    public function agregar()
    {
        return view('gastos.agregar');
    }

    public function crear(Request $request)
    {
        $nombre = $request->get('nombre');
        $pesos = $request->get('pesos');
        $centavos = $request->get('centavos');
        $dia = $request->get('dia');
        $mes = $request->get('mes');
        $año = $request->get('año');
        $pagado = $request->has('pagado');

        $gasto = Gasto::create([
            'nombre' => $nombre,
            'monto' => "{$pesos}.{$centavos}",
            'vencimiento' => "{$año}-{$mes}-{$dia}",
            'pagado' => $pagado,
        ]);

        // Mail::to('nlattessi@gmail.com')->send(new RecordatorioServicio($gasto));

        return redirect('gastos');
    }

    public function pagar(Request $request)
    {
        $id = $request->get('pagar_id');

        $gasto = Gasto::findOrFail($id);
        $gasto->pagado = true;
        $gasto->save();

        return redirect('gastos');
    }

    public function borrar(Request $request)
    {
        $id = $request->get('borrar_id');

        $gasto = Gasto::findOrFail($id);
        $gasto->delete();

        return redirect('gastos');
    }
}
