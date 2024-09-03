<x-mail::message>

<h3>New Massage From :{{$mailData ['email']}}</h3>

<p>Name : {{$mailData ['name']}}</p>

<p>Subject : {{$mailData ['subject']}}</p>

<p>Message : {{$mailData ['message']}}</p>

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
