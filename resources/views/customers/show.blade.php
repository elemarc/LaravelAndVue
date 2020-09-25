@extends('layouts.app')<!-- le digo que haga extend al archivo layout-->

@section('title','Details for '. $customer->name)<!-- titulo de la pagina, que se envia al layout-->
    
<!-- PAGINA DE MOSTRAR -->
@section('content')<!--Aqui le digo a blade que esta es la seccion content -->

<div class="row">
    <div class="col-12"><h1>Customer Data for {{$customer->name}}</h1></div>
    <p> <a href="/customers/{{$customer->id}}/edit">Edit user</a></p>
</div>

<div class="row">
    <div class="col-12">
        <p><strong> Name: </strong>{{$customer->name}} </p>
        <p><strong> Email: </strong>{{$customer->email}} </p>
        <p><strong> Company: </strong>{{$customer->company->name}} </p>
        <p><strong> Status: </strong>{{$customer->active}} </p>
    </div>
    <div>
        <form action="/customers/{{$customer->id}}"method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@endsection