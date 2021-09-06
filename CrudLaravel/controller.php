<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;


class EmpleadoController extends Controllers
{
   
    public function index()
    {
        $empleados = Empleado::all();
        return view('index', compact('student'));
    }

    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'codigo' => 'required|max:255',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|numeric',
            'direccion' => 'required|max:255',
        ]);
        $empleados = Empleado::create($storeData);

        return redirect('/empleado')->with('Completado', 'El empleado a sido guardado!');
    }

    
    public function show($id)
    {
    }

  
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('edit', compact('student'));
    }

   
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'codigo' => 'required|max:255',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|numeric',
            'direccion' => 'required|max:255',
        ]);
        Empleado::whereId($id)->update($updateData);
        return redirect('/empleados')->with('Completado', 'El empleado a sido guardado');
    }

  
    public function destroy($id)
    {
        $empleados = Empleado::findOrFail($id);
        $empleados->delete();

        return redirect('/empleados')->with('Completado', 'Empleado eliminado');
    }
}
