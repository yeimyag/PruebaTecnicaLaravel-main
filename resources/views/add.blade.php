<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
    </head>
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
@yield('scripts')
    <body>
        @include('layauts.navbar')
        <div class="container-flex">
            <form class="container-form" method="post">
                @csrf
                <div class="form-control">
                    <label class="label">Titulo:</label>
                    <input class="input" type="text" name="titulo" required value="{{ old('titulo')}}"/>
                    @error('titulo')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">Descripcion:</label>
                    <textarea class="input" type="text" name="descripcion" required value="{{ old('decripcion')}}"></textarea>
                    @error('descripcion')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <label>Fecha Vencimiento:</label>
                    <input class="input" type="date" name="fecha_vencimiento" required value="{{ old('fecha_vencimiento')}}"/>
                    @error('fecha_vencimiento')
                        <p class="error">{{$message}}</p>
                    @enderror
                    
                </div>
                <div class="container-button"> 
                    <button type="submit" class="btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </body>
</html>
 