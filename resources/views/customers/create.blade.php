@extends('layouts.app')<!-- le digo que haga extend al archivo layout-->

@section('title','Add New Customer')<!-- titulo de la pagina, que se envia al layout-->
    
<!-- PAGINA DE CREAR CUSTOMERS -->
@section('content')<!--Aqui le digo a blade que esta es la seccion content -->

<div class="row">
    <div class="col-12"><h1>Add New Customer</h1></div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/customers" method="POST" enctype="multipart/form-data" ><!-- esto ultimo es el cifrado necesario para subir imagenes y ficheros -->
            @include('customers.form')<!-- mito el form-->
        <button type="submit" class="btn btn-primary">Add Customer</button>
    
        @csrf <!-- si no pones esto laravel bloquea el envio por seguridad -->
    </form>
</div>
</div>

@endsection