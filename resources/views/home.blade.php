<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body>
       @include('layauts.navbar')
       <div class="container-table">
            <table id="tasks-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                     <th><button class="btn btn-primary" onclick="window.location.href='{{route('addHomeworks')}}'">Añadir Tarea</button></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarea as $item)
                        <tr>
                            <td>{{$item->titulo}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->fecha_vencimiento}}</td>
                            <td>
                                <form id="{{$item->id}}" action="{{route('complete', $item->id)}}">
                                    <input type="radio" id="{{$item->id}}" onchange="handleChange(this)" {{$item->completado==0?'terminar':'disabled checked'}} />
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                 
            </table>
            {{ $tarea->links() }}
            

            @yield('scripts')
        </div>
    </body>
    
    <script>
        
        function handleChange(data) {
            const id = data.id;
            document.getElementById(id).submit();
        }
        

    </script>
</html>