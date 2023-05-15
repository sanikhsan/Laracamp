<x-mail::message>
# Your Transaction Has Been Confirmed

Hi, {{$checkout->User->name}}.
<br>
Your transaction has been confirmed,
now you can enjoy the benefits of <b> {{$checkout->Camp->title}} </b> Camp.

<x-mail::button :url="route('customer.dashboard')">
My Dashboard
</x-mail::button>

Thank You,<br>
{{ config('app.name') }}
</x-mail::message>
