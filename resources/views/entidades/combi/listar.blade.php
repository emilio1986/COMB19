
<div style="background-color: rgb(66, 97, 114)">
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Listar combis') }}
        </h2>
    </x-slot>

    @if(session()->has('tieneruta'))
    <div class="alert alert-warning text-center" role="alert">
        <span>No es posible eliminar la combi, tiene una ruta asignada</span>
    </div>
    @endif

    @if(session()->has('combieliminada'))
    <div class="alert alert-success text-center" role="alert">
        <span>Se ha eliminado la combi {{session()->get('combieliminada')->name}}</span>
    </div>
    @endif

    @if($resultado->isEmpty())
    <div class="alert alert-success text-center" role="alert">
        <span>No hay combis disponibles, pruebe agregando una </span>
    </div>

    @else

    <div class="mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 ">


                <table class="table table-hover p-2">
                    <thead>
                        <tr>
                            <th scope="col">Patente</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Tipo de combi</th>
                            <th scope="col">Chofer</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    @foreach ($resultado as $combi)

                    <tbody id='choferes'>
                        <tr>
                            <td>{{ $combi->patente }}</td>
                            <td>{{ $combi->modelo }}</td>
                            <td>{{ $combi->tipo_de_combi }}</td>

                            <td>
                                @isset($combi->chofer)
                                <a href="{{ route('chofer.info', ['chofer' => $combi->chofer]) }}">
                                    {{ $combi->chofer->name }}
                                    @else
                                    Libre
                                    @endisset
                            </td>


                            <!-- BOTON MODIFICAR -->
                            <td>
                                <a href="{{ route('combi.edit',['combi' => $combi]) }}">
                                    <button type="button" class="btn btn-primary" title="Editar combi">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                    </button>
                                </a>
                                <!-- Eliminar-->


                                <!-- BOTON VER -->
                                <a href="{{ route('combi.info', ['combi' => $combi]) }}">
                                    <button type="button" class="btn btn-primary" title="Ver combi">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>

                                    </button>
                            </td>

                        </tr>
                    </tbody>

                    @endforeach
                </table>


                <div class="container">
                    {{ $resultado->links() }}
                </div>
            </div>


        </div>

    </div>
    @endif
</x-app-layout>



    <footer class="page-footer font-small white">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
          <a href="https://www.google.com" style="color:whitesmoke"> COMBI19.com</a>
        </div>
      </footer>

      </div>
