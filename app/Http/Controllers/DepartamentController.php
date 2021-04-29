<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departament;
use Illuminate\Http\Response;

class DepartamentController extends Controller
{
   
    public function index()
    {
        return Departament::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'departament' => 'required', 
        ]);

        $created = Departament::create([
            'departament' => request('departament')
        ]);
        
        if($created){
            return redirect()->route('departaments.index')->with('creado');
        }else{
            return "no se ha podido crear";
        };
        
    }

    public function update($id)
    {
        request()->validate([
            'departament' => 'required', 
        ]);

        $departament = Departament::where('departament_id','=', $id)
        ->update([
            'departament' => request('departament')
        ]);

    }

    public function destroy($id)
    {
        $delete = Departament::select('*')
        ->where('departament_id','=', $id);
        $delete->delete();

        return response()->json($delete);
    }
}
