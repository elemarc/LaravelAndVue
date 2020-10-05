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
    @can('delete', $customer) <!--recordatorio que aqui se pasa el customer especifico ya que se actua sobre el -->
    <div> 
        <form action="/customers/{{$customer->id}}"method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    @endcan
</div>

@if($customer->image)<!--si el customer tiene una imagen de perfil la muestra-->
    <div class="row">
        <div class="col-12">
            <image src="{{asset('storage/' . $customer->image)}}" class="img-thumbnail"></image> <!-- asset localizado en storage y su nombre de imagen (linkead al user ya que se ha guardado con ese nombre al subirla)
        </div>
    </div>
@endif

@endsection