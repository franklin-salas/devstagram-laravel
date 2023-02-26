@extends('layouts.app')

@section('titulo')
    Inicia Sesión Devstagram
@endsection
@section('contenido')
    <div class="md:flex md: justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 ">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form  method="POST" action="{{route('login')}}" novalidate >
                @csrf
                <div class="mb-4">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                        email
                    </label>
                    <input type="email" id="email" name="email" placeholder="correo electronico"
                    class="border p-2 w-full rounded-lg @error('email') border-red-500
                    @enderror "
                    value="{{ old('email') }}">
                    @error('email')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror


                </div>
                <div class="mb-4">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                        password
                    </label>
                    <input type="password" id="password" name="password" placeholder="contraseña"
                    class="border p-2 w-full rounded-lg @error('password') border-red-500
                    @enderror "
                    >
                    @if (session('msg'))
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ session('msg')}}
                    </span>
                    @endif
                    @error('password')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror


                </div>
                <div class="mb-4">
                    <input type="checkbox" name="remember"> <label class="text-gray-500 font-bold text-sm">Manteber mi sesión abierta</label>
                </div>

                <input type="submit"
                    value="Iniciar Session"
                    class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-2 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection
