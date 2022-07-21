<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    public function index()
    {
        $licencias = Licencia::latest('created_at')->paginate(10);
        return view('admin.licencias.index', compact('licencias'));
    }
    
    public function create()
    {
        return view('admin.licencias.create');
    }

    public function store(Request $request)
    {

        // Obteniendo el puro nombre
        $name = $request->nombre;

        // Obteniendo la fecha sin ":"
        $hora = date("h:i:s");
        $doubleDot = ":";
        $replaceDot = "";
        $time = str_replace($doubleDot, $replaceDot, $hora);

        // Obteniendo la fecha
        $hoy = date("Ymd");

        // Obteniendo las primeras letras
        $nombre = '';
        $explode = explode(' ',$name);
        foreach($explode as $x){
            $nombre .=  $x[0];
        }

        // Estructurando el folio
        $folio = $nombre ."-" . $time ."-". $hoy;

        // Obteniendo todos los valores del request
        $valores = $request->all();

        // Asignando el folio generado a la columna del modelo
        $valores['folio'] = $folio;

        Licencia::create($valores);

        return redirect()->route('licencias.index')->with('success', 'Registro creado correctamente');
    }


    public function edit(Licencia $licencia)
    {
        return view('admin.licencias.edit', compact('licencia'));
    }

    public function update(Request $request, Licencia $licencia)
    {
        // Obteniendo el puro nombre
        $name = $request->nombre;

        // Obteniendo la fecha sin ":"
        $hora = date("h:i:s");
        $doubleDot = ":";
        $replaceDot = "";
        $time = str_replace($doubleDot, $replaceDot, $hora);

        // Obteniendo la fecha
        $hoy = date("Ymd");

        // Obteniendo las primeras letras
        $nombre = '';
        $explode = explode(' ',$name);
        foreach($explode as $x){
            $nombre .=  $x[0];
        }

        // Estructurando el folio
        $folio = $nombre ."-" . $time ."-". $hoy;

        // Obteniendo todos los valores del request
        $valores = $request->all();

        // Asignando el folio generado a la columna del modelo
        $valores['folio'] = $folio;

        // Actualizando registro
        $licencia->update($valores);

        return redirect()->route('licencias.index')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy(Licencia $licencia)
    {
        try{
            $licencia->delete();
            return redirect()->route('licencias.index')->with('success', 'Registro eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('licencias.index')->with('error',$e->getMessage());
        }
    }

    public function comprar()
    {
        return view('admin.licencias.comprar');
    }
    public function storePublic(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required',
            'correo'       => 'required',
            'telefono'   => 'required',
            'licencia'   => 'required',
            'cantidad'  => 'required',
        ]);

        // Obteniendo el puro nombre
        $name = $request->nombre;

        // Obteniendo la fecha sin ":"
        $hora = date("h:i:s");
        $doubleDot = ":";
        $replaceDot = "";
        $time = str_replace($doubleDot, $replaceDot, $hora);

        // Obteniendo la fecha
        $hoy = date("Ymd");

        // Obteniendo las primeras letras
        $nombre = '';
        $explode = explode(' ',$name);
        foreach($explode as $x){
            $nombre .=  $x[0];
        }

        // Estructurando el folio
        $folio = $nombre ."-" . $time ."-". $hoy;

        // Obteniendo todos los valores del request
        $valores = $request->all();

        // Asignando el folio generado a la columna del modelo
        $valores['folio'] = $folio;

        Licencia::create($valores);

        return redirect()->route('licencias.index')->with('success', 'Registro creado correctamente');
    }
}
