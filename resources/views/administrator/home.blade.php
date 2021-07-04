<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Bienvenido/a Administrador') }}
        </h2>
    </x-slot>
    @if (session()->has('viajecancelado'))
        <div class="alert alert-success text-center" role="alert">
            <span>El viaje ha sido cancelado, se le ha devuelto el dinero a los pasajeros</span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           
                <div class="p-6 bg-white border-b border-gray-200">
                    Has iniciado sesion correctamente
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
