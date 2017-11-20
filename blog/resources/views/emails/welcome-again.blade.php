@component('mail::message')
# Introduction

The body of your message.

Thanks so much for registering!

@component('mail::button', ['url' => 'https://blog.dev'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some inspirational quote to go here. :)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
