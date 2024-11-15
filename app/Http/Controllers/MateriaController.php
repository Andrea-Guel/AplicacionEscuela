<?php

namespace App\Http\Controllers;
use App\Models\materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    
    public function index(){
        
        $materias = materia::all(); 
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
        $Materia1 = new materia();
        $Materia1->nombre = $request->nombre;
        $Materia1->descripcion = $request->descripcion;
        $Materia1->cuatrimestre = $request->cuatrimestre;
        $Materia1->save();
        $materias = materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

    public function show($id){
        $materias = materia::find($id);
        return view(view:'Materias/materia_edit', data: compact('materias'));
    }

    // Actualizar la información de la materia
    public function update(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:60',
            'descripcion' => 'nullable|string|max:255',
            'cuatrimestre' => 'nullable|integer'
        ]);
        $materia = materia::findOrFail($request->id);
        $materia->nombre = $request->nombre;
        $materia->descripcion = $request->descripcion;
        $materia->cuatrimestre = $request->cuatrimestre;
        $materia->save();
        //return $materia;
        $materias = materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

    // Eliminar una materia
    public function destroy(Request $request){
    
        $materia1 = materia::findOrFail($request->id);
        $materia1->delete(); // Eliminar la materia

        $materias = materia::all(); 
        return view(view: 'Materias/materias_index', data: compact(var_name: 'materias'));
    }

}