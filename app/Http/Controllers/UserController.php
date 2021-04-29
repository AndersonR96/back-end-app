<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function index()
    {
    
        return User::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required' ,
            'departament_id' => 'required',
            'last_name' => 'required' ,
            'identification_number' => 'required' ,
            'email' => 'required' ,
        ]);

        $created = User::create([
            'departament_id' => request('departament_id'),
            'name' => request('name') ,
            'last_name' => request('last_name') ,
            'identification_number' => request('identification_number') ,
            'email' => request('email') ,
        ]);

        if($created){
            return redirect()->route('users.index')->with('creado');
        }else{
            return "no se ha podido crear";
        };
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required' ,
            'last_name' => 'required' ,
            'identification_number' => 'required' ,
            'email' => 'required' ,
        ]);
        $user = User::where('user_id', '=', $id)
            ->update([
                'departament_id' => request('departament_id'),
                'name' => request('name') ,
                'last_name' => request('last_name') ,
                'identification_number' => request('identification_number') ,
                'email' => request('email'),
        ]);
     
    }

    public function destroy($id)
    {   
        $delete = User::select('*')
        ->where('user_id','=', $id);
        $delete->delete();

        return response()->json($delete);
    }
}
