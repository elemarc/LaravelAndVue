@extends('layouts.app')<!-- le digo que haga extend al archivo layout-->

@section('title','Edit Customer'. $customer)<!-- titulo de la pagina, que se envia al layout-->
    
<!-- PAGINA DE EDITAR  CUSTOMERS -->
@section('content')<!--Aqui le digo a blade que esta es la seccion content -->

<div class="row">
    <div class="col-12"><h1>Edit Customer {{$customer->name}} </h1></div>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{route('customers.update',['customer' => $customer->id])}}" method="POST" > <!-- esablece el 'customer' de la ruta customers.$'customer' como el que le paso -->
            <!-- como HTTP solo tiene GET y POST, se añade PATCH o PUT (son lo mismo) desde un method de laravel-->
            @method('PATCH')
            @include('customers.form')<!-- mito el form-->
        <button type="submit" class="btn btn-primary">Save changes</button>
    
        @csrf <!-- si no pones esto laravel bloquea el envio por seguridad -->
    </form>
</div>
</div>

@endsection