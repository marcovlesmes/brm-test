@extends('layouts.app')

@section('content')
    <h1 class="text-center">Sistema de roles</h1>
    
    @role('Role 1')
        <span class="m-4">Rol 1</span>
    @else
        <span class="m-4">Rol 2</span>
    @endrole
    > 
    <a class="text-blue-400" href="{{ route('permissions.index') }}">Modificar permisos</a>
    <div class="flex">
        <div class="flex-grow bg-gray-300 p-4 mx-2 rounded">
            <h2>Info</h2>
            <ol>
                @can('info.create')
                    <li>Puede editar la información</li>
                @endcan
                @can('info.read')
                    <li>Puede leer la información</li>
                @endcan
                @can('info.update')
                    <li>Puede actualizar la información</li>
                @endcan
                @can('info.delete')
                    <li>Puede eliminar la información</li>
                @endcan
            </ol>
            @forelse ($infos as $item)
                {{ $item }}
            @empty
                No hay info.
            @endforelse
        </div>
        <div class="flex-grow bg-gray-300 p-4 mx-2 rounded">
            <h2>Imágenes</h2>
            <ol>
                @can('images.create')
                    <li>Puede editar las imágenes</li>
                @endcan
                @can('images.read')
                    <li>Puede leer las imágenes</li>
                @endcan
                @can('images.update')
                    <li>Puede actualizar las imágenes</li>
                @endcan
                @can('images.delete')
                    <li>Puede eliminar las imágenes</li>
                @endcan
            </ol>
    
            @forelse ($imgs as $item)
                {{ $item }}
            @empty
                No hay imágenes.
            @endforelse
        </div>
    </div>
@endsection
