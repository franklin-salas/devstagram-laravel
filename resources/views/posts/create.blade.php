@extends('layouts.app')

@section('titulo')
Crea una nueva Publicacion
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10" >
        <form action="{{route('imagenes.store')}}"  method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed order-2  w-ful h-96 rounded flex flex-col justify-center items-center">
        @csrf
    </form>
        </div>
    <div class="md:w-1/2 p-10 bg-white  rounded-lg shadow mt-10 md:mt-0" > 
        <form action="{{ route('post.store') }}" method="POST" novalidate >
            @csrf
            <div class="mb-4">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                    Titulo
                </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion "
                    class="border p-2 w-full rounded-lg  @error('titulo') border-red-500
                    @enderror"
                    value="{{old('titulo')}}">
                    @error('titulo')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror

            </div>

            <div class="mb-4">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                    Descripción
                </label>
                <textarea type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la publicacion "
                    class="border p-2 w-full rounded-lg  @error('descripcion') border-red-500
                    @enderror"
                    >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror

            </div>
            <div class="mb-4">
                <input type="hidden" name="imagen"  value="{{old('imagen')}}">
                @error('imagen')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <input type="submit"
            value="Crear Pulicación"
            class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-2 text-white rounded-lg">
            </form>
    </div>
</div>
@endsection

