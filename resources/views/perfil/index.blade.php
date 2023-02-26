@extends('layouts.app')

@section('titulo')
    Editar Perfil {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form  action="{{route('perfil.store')}}"  enctype="multipart/form-data" class="mt-10 md:mt-0" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                    Username
                </label>
                <input type="text" id="username" name="username" placeholder="Nombre de usuario"
                    class="border p-2 w-full rounded-lg @error('username') border-red-500
                    @enderror "
                    value="{{ auth()->user()->username}}">
                    @error('username')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror

            </div>
            <div class="mb-4">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                   Imagen perfil
                </label>
                <input type="file" id="imagen" name="imagen" 
                    class="border p-2 w-full rounded-lg "
                    value=""
                    accept=".jpg, .jpeg, .png"
                    >
            </div>
            <input type="submit"
            value="Guardar Cambios"
            class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-2 text-white rounded-lg">
        </form>
        
    </div>
</div>

@endsection