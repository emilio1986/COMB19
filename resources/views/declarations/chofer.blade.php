<!--Just copy and paste each <div> -->

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
        <x-nav-link :href="route('chofer.log',)" :active="request()->routeIs('log')">
            {{ __('Viajes Realizados') }}
        </x-nav-link>
    </div>


