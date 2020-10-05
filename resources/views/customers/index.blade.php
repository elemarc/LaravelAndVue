@extends('layouts.app')<!-- le digo que haga extend al archivo layout-->

@section('title','Customer list')<!-- titulo de la pagina, que se envia al layout-->
    
<!-- PAGINA DE INDEX, DONDE SE MUESTRAN CUSTOMERS Y COMPANIES-->
@section('content')<!--Aqui le digo a blade que esta es la seccion content -->
<div class="row">
    <div class="col-12">
        <h1> Customers List </h1>    
    </div>
</div>

<div class="row">
    <div class="col-12">
        @can('create', App\Customer::class)<!-- aplico las policies y paso la clase customer (pq si, es sobre la que va a decidir los permisos y se tiene que poner-->
            <p> <a href="customers/create">Add New Customer</a></p> <!--link a la pagina de crear -->
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-4">
        <h4>Name</h4>
    </div>
    <div class="col-3">
        <h4>Email</h4>
    </div>
    <div class="col-3">
        <h4>Company</h4>
    </div>
    <div class="col-2">
        <h4>Status</h4>
    </div>
</div>
<hr> <!-- linea horizontal -->

@foreach ($customers as $customer)
<div class="row">
    <div class="col-4">
        <a href="/customers/{{$customer->id}}"> {{$customer->name}}</a> 
    </div>
    <div class="col-3"> {{$customer->email}} </div>
    <div class="col-3"> {{$customer->company->name}} </div>
    <div class="col-2"> {{$customer->active}} </div>
</div>
@endforeach

<div class="row">
    <div class="col-12 text-center pt-4">
        {{$customers->links()}} <!--añado los links de numeros de paginación -->
    </div>
</div>



@endsection