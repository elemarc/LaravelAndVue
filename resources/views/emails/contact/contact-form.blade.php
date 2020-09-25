@component('mail::message')

# Gracias por tu mensaje

<strong> Name: </strong> {{$data['name']}}
<strong> Mail: </strong> {{$data['email']}}
<strong> Message: </strong> 

{{$data['message']}}
@endcomponent
