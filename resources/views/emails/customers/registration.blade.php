<x-mail::message>
# Welcome!
Hello, {{$user->name}}
<br>
Welcome to Laracamp!
Your account has been created successfully.
Now you can choose your best match Bootcamp!

<x-mail::button :url="route('customer.login')">
Login Now!
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
