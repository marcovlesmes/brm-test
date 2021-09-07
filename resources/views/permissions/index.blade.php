@extends('layouts.app')

@section('content')
    <h1 class="text-center">Modificar roles</h1>
    <a class="text-blue-400" href="{{ route('index') }}">Regresar</a>
    <form action="{{ route('permissions.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex">
            @foreach ($roles as $role)
                <div class="flex-grow flex flex-col bg-gray-300 p-4 mx-4 my-2 rounded">
                    <h2>{{ $role->name }}</h2>
                    {{ $rol = str_replace(' ', '', $role->name) }}
                    <p>Seleccione que permisos activar/desactivar para el {{ $role->name }}</p>
                    @foreach ($permissions as $permission)
                        <div class="my-2">
                            <input type="checkbox" id="{{ $rol . '_' .  $permission->id }}" name="{{ $rol . '_' . $permission->name }}"
                            @if ($role->hasPermissionTo($permission->name))
                                checked
                            @endif
                            >
                            <label for="{{ $rol . '_' . $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="my-2 flex flex-col w-1/5">
            <label for="role">Seleccionar el role del usuario</label>
            <select name="role" id="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="bg-blue-400 font-bold p-2 rounded" type="submit">Modificar</button>
    </form>
@endsection