@component('mail::message')
Hello Dear Admin!!

Your Employee {{$user->name}} just logged in to your account at {{ config('app.name') }}.

It's a good practice to keep your account secure. If you didn't authorize this login, please change your password immediately.

Regards,<br>
{{ config('app.name') }}
@endcomponent