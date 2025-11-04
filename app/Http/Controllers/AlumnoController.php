<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View {
        $alumno = Alumno::all(); 
        return view('alumnos.index', ['alumno' => $alumno]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $alumno = new Alumno($request->all()); //eloquent, no hace nada en la base de datos
        $result = false;

        try {
            $result = $alumno->save(); //eloquent, insera objeto en la tabla
            $txtmessage = "The haircut has been added.";

            // Si me llega el archivo, lo subo y lo guardo
            if($request->hasFile('image')) {
                $ruta = $this->upload($request, $alumno);
                $alumno ->image = $ruta;
                $alumno->save();
            }
        } catch(UniqueConstraintViolationException $e){
            $txtmessage = "Primary Key";
        } catch(QueryException $e){
            $txtmessage = "Null value";
        }

        $message = [
                "mensajeTexto" => $txtmessage,
            ];

        if($result){
            return redirect() -> route('main')->with($message);
            // ->with($message) -> estos datos se guardan en la sesión
        }else{
            return back()->withInput()->withErrors($message);
        }
    }

    private function upload(Request $request, Alumno $alumno) {
        // Logica para subir el archivo
        $fotografia = $request->file('fotografia');
        $name = $fotografia->id . "." . $fotografia->getClientOriginalExtension();

        // Guardar en el storage public
        $ruta = $fotografia->storeAs('alumno', $name, 'public');
        // Guardar en el storage privade
        $ruta = $fotografia->storeAs('alumno', $name, 'local');

        return $ruta;
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno) {
        
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno):View {
        return view('alumnos.edit',  ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno):RedirectResponse {
        
        $result = false;
        $alumnno->fill($request->all());

        try {
            $result = $alumno->save(); //eloquent, edita un objeto de la tabla

            $txtmessage = "The haircut has been edited.";
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = "Primary Key";
        } catch(QueryException $e) {
            $txtmessage = "Null value";
        }catch (\Exception $e) {
            $txtmessage = "Fatal error";
        }

        $message = [
                "mensajeTexto" => $txtmessage,
            ];

        if($result){
            return redirect() -> route('main')->with($message);
        }else{
            return back()->withInput()->withErrors($message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno) {
        try{
            $result = $alumno->delete();
            $textmessage='El CV se ha eliminado';
        }
        catch(\Exception $e){
            $result = false;
            $textmessage='El Cv no se ha conseguido eliminar';
        }
        $message = [
            'messajeTexto' => $textmessage,
        ];
        if($result){
                return redirect()->route('main')->with($message);
            } else {
                return back()->withInput()->withErrors($message);
            }
    }
}
