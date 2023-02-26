@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection
@section('contenido')
    <div class="md:flex md: justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 ">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro de usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form action="{{ route('register.store') }}" method="POST" novalidate >
                @csrf
                <div class="mb-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" placeholder="Nombre "
                        class="border p-2 w-full rounded-lg  @error('name') border-red-500
                        @enderror"
                        value="{{old('name')}}">
                        @error('name')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message}}
                        </span>
                        @enderror

                </div>
                <div class="mb-4">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="Nombre de usuario"
                        class="border p-2 w-full rounded-lg @error('username') border-red-500
                        @enderror "
                        value="{{ old('username') }}">
                        @error('username')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message}}
                        </span>
                        @enderror

                </div>
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
                    @error('password')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror


                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold text-sm">
                        Repetir password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repetir contraseña"
                    class="border p-2 w-full rounded-lg @error('password_confirmation') border-red-500
                    @enderror "
                   >
                    @error('password_confirmation')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message}}
                    </span>
                    @enderror


                </div>

                <input type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-2 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection
