<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{__('Login')}}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous"
      />
    </head>
    <body class="">
        <div class="card-container">
            <h1 class="">{{__('Login')}}</h1>
            <form class="container-form" method="post">
                @csrf
                <div class="">
                    <label class="label">{{__('Email')}}:</label>
                    <input class="form-control" type="email" name="email" required value="{{ old('email')}}"/>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="label">{{__('Password')}}:</label>
                    <input class="form-control" type="password" name="password" required />
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="">
                    <button class="btn-primary" type="submit">{{__('Login')}}</button>
                    <button class="btn-secondary" onclick="window.location.href='{{route('register')}}'" type="button">{{__('Register')}}</button>
                </div>
                @error('message')
                    <p class="error">{{$message}}</p>
                @enderror
            </form>
        </div>
    </body>
</html>