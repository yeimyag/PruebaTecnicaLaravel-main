<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{__('Register')}}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="">
        <div class="bg-info d-flex justify-content-center align-items-center vh-100">
            <h1 class="container-h2">{{__('Register')}}</h1>
            <form class="container-form" method="post">
                @csrf
                <div class="form-control">
                    <label class="label">{{__('Name')}}:</label>
                    <input class="input" type="text" name="name" required value="{{ old('name')}}"/>
                    @error('name')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">{{__('Email')}}:</label>
                    <input class="input" type="email" name="email" required value="{{ old('email')}}"/>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">{{__('Password')}}:</label>
                    <input class="input" type="password" name="password" required/>
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="container-button">
                    <button class="btn-primary" type="submit">{{__('Comfirm')}}</button>
                    <button class="btn-secondary" onclick="window.location.href='{{route('login')}}'" type="button">{{__('Login')}}</button>
                </div>
            </form>
        </div>
    </body>
</html>