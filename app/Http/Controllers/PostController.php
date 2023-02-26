<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth')->except(['show', 'index']);
     }
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(4);
        return view('dashboard' ,[  'user' => $user ,
                                    'posts' =>$posts   

                                 ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'titulo' =>'required| max:255',
                'descripcion' =>'required',
                'imagen' =>'required'
            ]);

            // Post::create([
            //     'titulo'=> $request->titulo,
            //     'descripcion' => $request->descripcion,
            //     'imagen' => $request->imagen,
            //     'user_id' => auth()->user()->id
            // ]);

            $request->user()->posts()->create([
                'titulo'=> $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
            ]);

            return redirect()->route('post.index', auth()->user()->username);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Post $post)
    {
        return view('posts.show',[ 'post' => $post , 'user' => $user]);
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
    public function destroy(Post $post)
    {
            $this->authorize('delete', $post);
            $post->delete();
            //Eliminar imagen
            $imagenPath = public_path('uploads'. '/'.$post->imagen);
            if(File::exists($imagenPath)){

                unlink($imagenPath);
            }

            
            return redirect()->route('post.index', auth()->user()->username);
    }
}
