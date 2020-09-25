<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getLocale())}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale1">

    <title>@yield('title', 'Marc')</title> <!-- titulo de cada pagina en la pestaña, hago yield de la seccion titulo y pongo un estatico que se superponra si no recive ninguno-->

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>


<div class="container">

    @include('nav', ['username'=>'cool_user_123'])<!-- invluyo el view nav.blade.php, y mando el user al nav -->
    @if(session()->has('message')) <!-- si la sesion recibe un mensaje, crea el siguiente div-->
    <div class="alert alert-success" role="alert">
        {{session()->get('message')}}
    </div>
    @endif
    @yield('content') <!-- le digo a blade que aqui ponga la seccion content -->
</div>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>