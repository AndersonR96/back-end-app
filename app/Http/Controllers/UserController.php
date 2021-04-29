<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::join('departaments as de','de.departament_id','=','users.user_id')
        ->select('users.user_id as user_id',
                'users.name as name',
                'users.last_name as last_name',
                'de.departament as departament',
                'users.identification_number as identification_number',
                'users.email as email',
                'users.created_at as created_at',
                'users.updated_at as updated_at'
                )->get();
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        // $update = User::update([
        //     'departament_id' => 2,
        //     'name' => request('name') ,
        //     'last_name' => request('last_name') ,
        //     'identification_number' => request('identification_number') ,
        //     'email' => request('email'),
        // ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $delete = User::select('*')
        ->where('user_id','=', $id);
        $delete->delete();

        return response()->json($delete);
    }
}
