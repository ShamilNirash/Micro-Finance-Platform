@extends('layouts.mainLayout')<body>
    @section('content')
     <div class="flex h-screen w-screen bg-white">

        <div class="hidden sm:flex">
        @include('shared.navbar')
        </div>
    </div>
    @include('shared.sidebar')
    </div>
    </div>
        @yield('content')
    </div>
    </body>

