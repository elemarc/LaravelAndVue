@extends('layouts.app')<!-- le digo que haga extend al archivo layout-->

@section('title','Contact us')<!-- titulo de la pagina, que se envia al layout-->


@section('content')<!--Aqui le digo a blade que esta es la seccion content -->

<h1>Contact Us </h1>

@if(! session()->has('message'))

<form action="{{route('contact.store')}}" method="post"><!-- mando el form al /contact-us con POST mediante el route helper y el name que hay el web.php-->
    <div class="form-group">
        <label for="name"> Name </label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control"> 
        <div>
            {{$errors->first('name')}}
        </div>
    </div>

    <div class="form-group">
        <label for="email"> Email </label>
        <input type="text" name="email" value="{{old('email')}}"  class="form-control"> 
        <div>
            {{$errors->first('email')}}
        </div>
    </div>

    <div class="form-group">
        <label for="message"> Message </label>
        <textarea name="message" value="{{old('message')}}" id="message" cols="30" rows="10" class="form-control"></textarea>
        <div>
            {{$errors->first('message')}}
        </div>
    </div>

    @csrf
    <button type="submit" class="btn btn-primary">Send message</button>
</form>
@endif

@endsection