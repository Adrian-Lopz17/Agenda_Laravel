<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir persona') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/persona">

                    <div class="form-group">
                        <label for="nombre" class="col-md-2 control-label">Nombre</label>
                        <textarea name="nombre"
                                  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  placeholder='Introduce nombre del contacto'></textarea>
                        @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="apellidos" class="col-md-2 control-label">Apellidos</label>
                        <textarea name="apellidos"
                                  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  placeholder='Introduce apellidos del contacto'></textarea>
                        @if ($errors->has('apellidos'))
                            <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="col-md-2 control-label">Teléfono</label>
                        <textarea name="telefono"
                                  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  placeholder='Introduce teléfono del contacto'></textarea>
                        @if ($errors->has('telefono'))
                            <span class="text-danger">{{ $errors->first('telefono') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="estrella" class="col-md-2 control-label">Favorito</label>
                        <textarea name="estrella"
                                  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  placeholder='Introduce "1" para marcar como favorito'></textarea>
                        @if ($errors->has('estrella'))
                            <span class="text-danger">{{ $errors->first('estrella') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="categoria_id" class="col-md-2 control-label">Categoría</label>
                        <select name='categoria_id'
                                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            <option value='' disabled selected>Selecciona una categoría</option>

                            @foreach(auth()->user()->categorias as $categoria)
                                <option value='{{$categoria->id }}'>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('categoria_id'))
                            <span class="text-danger">{{ $errors->first('categoria_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir contacto</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
