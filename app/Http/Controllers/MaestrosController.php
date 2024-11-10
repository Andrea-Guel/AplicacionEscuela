<?php

namespace App\Http\Controllers;

use App\Models\maestro;
use App\Models\materia;
use App\Models\profesorMateria;

use Illuminate\Http\Request;

class MaestrosController extends Controller
{
    public function index(Request $request){

        $materias = materia::all(); 
        return view(view: 'Maestros/Maestros_create', data: compact(var_name: 'materias'));
    //$maestros = Maestro::with('materia')->get();
    //return view('Maestros/Maestros_index', compact('maestros'));
    }

    // Guardar el nuevo profesor
    public function store(Request $request)
    {
        // Validación de los datos recibidos en la solicitud
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad' => 'required|integer',
            'genero' => 'nullable|string|max:20',
            'tel' => 'nullable',
            'materias' => 'required|array', // Aseguramos que se seleccionen materias
        ]);
    
        // Crear el nuevo maestro
        $Maestro1 = new Maestro();
        $Maestro1->nombre = $request->nombre;
        $Maestro1->apellido = $request->apellido;
        $Maestro1->edad = $request->edad;
        $Maestro1->genero = $request->genero;
        $Maestro1->tel = $request->tel;
        $Maestro1->save(); // Guarda el maestro y genera un ID
    
        // Ahora que el maestro está guardado, agregamos las materias seleccionadas
        foreach ($request->materias as $materiaId) {
            $ProfesorMateria = new ProfesorMateria();
            $ProfesorMateria->maestro_id = $Maestro1->id;  // Usar el ID del maestro recién creado
            $ProfesorMateria->materia_id = $materiaId;      // Asignar la materia seleccionada
            $ProfesorMateria->save();                       // Guardar la relación
        }
    
        // Obtener todos los maestros con sus materias
        $maestros = Maestro::with('materias')->get();
    
        // Pasar los datos a la vista
        return view('Maestros/Maestros_index', compact('maestros'));
    }
    

    public function listado(){
        $maestros = Maestro::with('materias')->get();
        return view('Maestros/Maestros_index', compact('maestros'));
    }

    public function show($id){
        $maestros = maestro::find($id);
        $materias1 = materia::all(); 
        return view(view:'Maestros/Maestros_edit', data: compact( 'maestros','materias1'));
    
    }

    // Actualizar la información del profesor
    public function update(Request $request)
    { 
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad' => 'required|integer',
            'genero' => 'nullable|string|max:20',
            'tel' => 'nullable',
            'materias' => 'required|array', // Aseguramos que se seleccionen materias
        ]);
    
        $maestro1 = maestro::findOrFail($request->id);
        $maestro1->nombre = $request->nombre;
        $maestro1->apellido = $request->apellido;
        $maestro1->edad = $request->edad;
        $maestro1->genero = $request->genero;
        $maestro1->tel = $request->tel;
        $maestro1->save(); // Guarda el maestro y genera un ID

    // Eliminar todas las materias asignadas previamente
    ProfesorMateria::where('maestro_id', $maestro1->id)->delete();

    // Agregar las nuevas materias seleccionadas
    foreach ($request->materias as $materiaId) {
        $ProfesorMateria = new ProfesorMateria();
        $ProfesorMateria->maestro_id = $maestro1->id;  // Asignar el ID del maestro
        $ProfesorMateria->materia_id = $materiaId;      // Asignar el ID de la materia
        $ProfesorMateria->save();                       // Guardar la relación

    // Obtener todos los maestros con sus materias
    $maestros = Maestro::with('materias')->get();

        $maestros = Maestro::with('materias')->get();
        return view('Maestros/Maestros_index', compact('maestros'));
    }}

     // Eliminar un profesor
     public function destroy(Request $request)
     {
         // Encuentra el maestro en la tabla de relaciones profesor_materia
         $profesorMateria = profesorMateria::where('maestro_id', $request->id)->get();
     
         // Elimina todas las relaciones de materias asociadas con el maestro
         foreach ($profesorMateria as $relacion) {
             $relacion->delete();
         }
     
         // Encuentra y elimina el maestro en la tabla maestro
         $maestro = Maestro::findOrFail($request->id);
         $maestro->delete();
     
         // Obtiene todas las materias y redirige a la vista de materias
         $maestros = Maestro::all(); 
         return view('Maestros/Maestros_index', compact('maestros'));
     }
     
}
