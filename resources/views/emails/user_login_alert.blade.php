@component('mail::message')
Hello {{$user->name}},


You can view your order details using the link below.


Regards,<br>
{{ config('app.name') }}
@endcomponent