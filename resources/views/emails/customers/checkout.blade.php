<x-mail::message>
# Registered Camp: {{$checkout->Camp->title}}

Hello, {{$checkout->User->name}}
<br>
Thank you for registed on <b>{{$checkout->Camp->title}}</b>,
Please see payment instruction by click the button below.

<x-mail::button :url="route('customer.dashboard')">
Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
