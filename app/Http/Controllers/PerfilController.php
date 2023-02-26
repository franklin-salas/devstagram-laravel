<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('perfil.index');
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
            $request->request->add(['username' =>
            Str::slug($request->username)]);
            $this->validate($request,[
                'username' => ['required', 'unique:users,username,'.auth()->user()->id,'min:3', 'max:20','not_in:editar-perfil'],
            ]);

            //['required', 'unique:users','min:3', 'max:20','not_in:editar-perfil', 'in:Cliente ']

            if($request->imagen){
                $imagen = $request->file('imagen');
                $nombreImagen = Str::uuid() . "." . $imagen->extension();
               
                $imagenServidor = Image::make($imagen);
               $imagenServidor->fit(1000,1000);
                // dd('llego');
                $imagenPath = public_path('perfiles'.'/' . $nombreImagen );
                $imagenServidor->save($imagenPath);
            }
            
            //guardar cambios
            $usuario = User::find(auth()->user()->id);
            $usuario->username = $request->username;
            $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null; // en caso de no estar definido$nommbreImagen
            $usuario->save();

            return redirect()->route('post.index', $usuario->username);

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
