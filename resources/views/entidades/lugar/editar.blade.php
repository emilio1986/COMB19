<div style="background-color: rgb(66, 97, 114)">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Editar Lugar') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Content starts -->
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('lugar.update',['lugar' => $lugar->id]) }}">
                @csrf
                @method('PUT')

                <div class="">
                    <x-label for="nombre" :value="__('Nombre de la terminal')" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre',$lugar->nombre)"
                        placeholder="Ej.:Terminal retiro"  required autofocus oninvalid="this.setCustomValidity('Por favor, ingrese una terminal')" oninput="setCustomValidity('')" />
                </div>

                <!-- Provincia -->
                <div class="mt-4">
                    <x-label for="provincia" :value="__('Provincia')" />

                    <x-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" :value="old('provincia',$lugar->provincia)"
                        placeholder="Ej.: Buenos Aires"  required autofocus oninvalid="this.setCustomValidity('Por favor, ingrese una provincia')" oninput="setCustomValidity('')" />
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-4">
                        {{ __('Editar' ) }}
                    </x-button>
                </div>

            </form>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
</div>
</div>

    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
</script>

<footer class="page-footer font-small white">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
      <a href="https://www.google.com" style="color:whitesmoke"> COMBI19.com</a>
    </div>
  </footer>

  </div>
