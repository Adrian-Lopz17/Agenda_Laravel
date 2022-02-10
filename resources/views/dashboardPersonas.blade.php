<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Listado de contactos</div>

                    <div class="flex-auto text-right mt-2">
                        <a href="/persona" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded">Añadir
                            nuevo contacto</a>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Estrella</th>
                        <th class="text-left p-3 px-5">Persona</th>
                        <th class="text-left p-3 px-5">Categoría</th>
                        <th class="text-left p-3 px-5">Acciones</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->personas as $persona)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                @if ($persona->estrella)
                                    <img style='width: 30px; height: auto' src='{{asset('images/estrellaLlena.png')}}'>
                                @else
                                    <img style='width: 30px; height: auto' src='{{asset('images/estrellaVacia.png')}}'>
                                @endif
                            </td>

                            <td class="p-3 px-5">
                                {{$persona->nombre}}   {{$persona->apellidos}}
                            </td>

                            <td class="p-3 px-5">
                              {{--  {{auth()->user()->categorias[($persona->categoria_id)]->nombre}}--}}
                                @foreach(auth()->user()->categorias as $categoria)
                                    @if($persona->categoria_id == $categoria->id)
                                        {{$categoria->nombre}}
                                    @endif
                                @endforeach
                            </td>

                            <td class="p-3 px-5">

                                <a href="/persona/{{$persona->id}}" name="editar"
                                   class="mr-3 text-sm bg-blue-500 hover:bg-blue-700  py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</a>
                                <form action="/persona/{{$persona->id}}" class="inline-block">
                                    <button type="submit" name="eliminar" formmethod="POST"
                                            class="text-sm bg-red-500 hover:bg-red-700  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        Eliminar
                                    </button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
