<?php

namespace App\Http\Controllers;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    
    public function index(){
        
        $materias = Materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }
    // Guardar la nueva materia
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:60',
            'descripcion' => 'nullable|string|max:255',
            'cuatrimestre' => 'nullable|integer'
        ]);
        $Materia1 = new Materia();
        $Materia1->nombre = $request->nombre;
        $Materia1->descripcion = $request->descripcion;
        $Materia1->cuatrimestre = $request->cuatrimestre;
        $Materia1->save();
        $materias = Materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

    public function show($id){
        $Materias = Materia::find($id);
        return view(view:'Materias/materia_edit', data: compact('Materias'));
    }

    // Actualizar la información de la materia
    public function update(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:60',
            'descripcion' => 'nullable|string|max:255',
            'cuatrimestre' => 'nullable|integer'
        ]);
        $materia = Materia::findOrFail($request->id);
        $materia->nombre = $request->nombre;
        $materia->descripcion = $request->descripcion;
        $materia->cuatrimestre = $request->cuatrimestre;
        $materia->save();
        //return $materia;
        $materias = Materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

    // Eliminar una materia
    public function destroy(Request $request){
    
        $materia1 = Materia::findOrFail($request->id);
        $materia1->delete(); // Eliminar la materia

        $materias = Materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

}